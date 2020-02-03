<?php

Route::get('/', function() {
    return redirect('films');
});

Route::post('/auth/logout', 'Admin\LoginController@doLogout')->name('doLogout');
Route::get('/auth/login', 'Admin\LoginController@getLogin')->name('login');
Route::post('/auth/login', 'Admin\LoginController@doLogin')->name('login');

Route::namespace('Admin')->middleware('admin')->group(function () {
    
    Route::get('/films', 'FilmsController@index')->name('films');
    Route::get('/films/add', 'FilmsController@create')->name('films.create');
    Route::get('/films/view/{film}', 'FilmsController@view')->name('films.view');
    Route::get('/films/delete/{film}', 'FilmsController@update')->name('films.delete');
    Route::get('/films/comments/{film}', 'FilmsController@comments')->name('films.comments');

    Route::post('/films/add', 'FilmsController@save')->name('films.create');
    Route::post('/films/update/{film}', 'FilmsController@update')->name('films.update');

    Route::get('/genres', 'GenresController@index')->name('genres');
    Route::get('/genres/add', 'GenresController@create')->name('genres.create');
    Route::get('/genres/view/{genre}', 'GenresController@view')->name('genres.view');
    Route::get('/genres/delete/{genre}', 'GenresController@delete')->name('genres.delete');

    Route::post('/genres/add', 'GenresController@save')->name('genres.create');
    Route::post('/genres/update/{genre}', 'GenresController@update')->name('genres.update');

    
});


Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});