<?php

Auth::routes();

// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout');

Route::get('/films', 'ApiController@index');
Route::get('/films/{film}', 'ApiController@film');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::post('/comment', 'ApiController@saveComment');
});


Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});