<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;

use App\Film;
use App\Genre;

class FilmsController extends Controller
{
    //

    public function index() {
        $films = Film::with('comments')->paginate(env('PAGINATION'));
        return view('admin.films.index', compact('films'));
    }

    public function create() {
        $genres = Genre::Active()->pluck('name', 'id');
        return view('admin.films.create', compact('genres'));
    }

    public function save(FilmRequest $request) {
        
        $film = Film::create($request->all());
        $film->genres()->sync($request->get('genres'));
        return redirect('films')->with(['status' => 'success', 'message' => 'Film Save Successfully.']);
    }

    public function view(Film $film) {

        $genres = Genre::Active()->pluck('name', 'id');
        return view('admin.films.view', compact('film','genres'));
    }

    public function update(Request $request, Film $film) {
        
        $film->update($request->all());
        $film->genres()->sync($request->get('genres'));

        return redirect('films')->with(['status' => 'success', 'message' => 'Film Updated Successfully.']);
    }

    public function delete(Genre $genre) {
        $genre->delete();
        return redirect('films')->with(['status' => 'success', 'message' => 'Film Delete Successfully.']);
    }

    public function comments(Film $film) {
        return view('admin.films.comments', compact('film'));
        return redirect('films')->with(['status' => 'success', 'message' => 'Film Delete Successfully.']);
    }
}
