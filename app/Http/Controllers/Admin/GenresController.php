<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;

use App\Genre;

class GenresController extends Controller
{
    //
    public function index() {
        $genres = Genre::paginate(env('PAGINATION'));
        return view('admin.genres.index', compact('genres'));
    }

    public function create() {
        return view('admin.genres.create');
    }

    public function save(GenreRequest $request) {
        Genre::create($request->all());

        return redirect('genres')->with(['status' => 'success', 'message' => 'Genre Save Successfully.']);
    }

    public function view(Genre $genre) {
        return view('admin.genres.view', compact('genre'));
    }

    public function update(Request $request, Genre $genre) {
        $genre->update($request->all());

        return redirect('genres')->with(['status' => 'success', 'message' => 'Genre Updated Successfully.']);
    }

    public function delete(Genre $genre) {
        
        $genre->delete();

        return redirect('genres')->with(['status' => 'success', 'message' => 'Genre Delete Successfully.']);
    }
}
