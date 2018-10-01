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

Route::get('/film/{film}', function(){
	return view('film');
})->name('film.view');

Route::get('/films/create', function(){
	return view('film_create');
})->name('film.view');
