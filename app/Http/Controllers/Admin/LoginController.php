<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function getLogin() {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request) {
        
        $check = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'role' => 'admin']);
        if ($check) {
            return redirect()->intended('films');
        }
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->intended('auth/login');
    }
}
