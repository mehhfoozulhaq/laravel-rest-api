<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
// use Symfony\Component\HttpKernel\Exception\InvalidArgumentException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {
            if ($exception->getPrevious() instanceof TokenExpiredException) {
                return response()->json($this->setResponse('TOKEN_EXPIRED', $exception->getStatusCode()), $exception->getStatusCode());
            } else if ($exception->getPrevious() instanceof TokenInvalidException) {
                return response()->json($this->setResponse('TOKEN_INVALID', $exception->getStatusCode()), $exception->getStatusCode());
            } else if ($exception->getPrevious() instanceof TokenBlacklistedException) {
                return response()->json($this->setResponse('TOKEN_BLACKLISTED', $exception->getStatusCode()), $exception->getStatusCode());
            } else if ($exception->getPrevious() instanceof Exception) {
                return response()->json($this->setResponse('REQUEST_INVALID', $exception->getStatusCode()), $exception->getStatusCode());
            } else {
                return response()->json($this->setResponse('UNAUTHORIZED_REQUEST', 401), 401);
            }
        }

        return parent::render($request, $exception);
    }

    private function setResponse($message, $code) {
        return [
            'status' => false,
            'code' => $code,
            'message' => $message,
            'result' => []
        ];
    }
}
