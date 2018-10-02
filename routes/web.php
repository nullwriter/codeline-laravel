<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/films', 301);

Route::get('/films', function () {
	return view('films');
})->name('films');

Route::get('/film/{film}', 'FilmController@detail')->name('film.view');

Route::get('/films/create', 'FilmController@create')->name('film.create');
Route::post('/comment', 'CommentController@create')->name('comment.submit');


Auth::routes();
