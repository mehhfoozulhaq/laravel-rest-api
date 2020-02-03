<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Resources\FilmsCollection;
use App\Http\Resources\FilmResource;

use JWTAuth;
use App\Film;
use App\User;
use App\Comment;

class ApiController extends Controller
{
    protected $user;

    public function __construct()
    {
        // $this->user = JWTAuth::parseToken()->authenticate();
        // $this->user->tasks()->save($task)
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $films = Film::with('comments')->orderBy('id', 'desc')->get();
		return new FilmsCollection($films);
    }

    public function film($slug)
    {   
        $film = Film::whereSlug($slug)->first();
		return new FilmResource($film);
    }

    public function saveComment(Request $request)
    {   
        $slug = $request->get('slug');
        $comment = $request->get('comment');

        $film = Film::whereSlug($slug)->first();
        if( !$film ) {
            return response()->json([
                'status' => false,
                'code' => 403,
                'message' => 'Film Not Found',
            ], 403);
        }

        Comment::create([
            'user_id' => $request->user()->id,
            'film_id' => $film->id,
            'comment' => $comment,
            'name' => $request->user()->name
        ]);

        return new FilmResource($film);
    }


}
