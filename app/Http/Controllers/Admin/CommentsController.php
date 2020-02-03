<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmRequest;

use App\Film;

class CommentsController extends Controller
{
    //

    public function index() {
        $films = Film::with('comments')->paginate(env('PAGINATION'));
        return view('films.index', compact('films'));
    }

    public function create() {
        $genres = Film::pluck('name', 'id');
        return view('films.create', compact('genres'));
    }

    public function save(FilmRequest $request) {
        
        Film::create($request->all());
        return view('films.create', compact('genres'));
    }
}
