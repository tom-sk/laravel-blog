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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/new-blog', 'BlogController@create');
Route::get('/edit/{blog}', 'BlogController@edit');
Route::get('/blog/{blog}', 'BlogController@show');

Route::post('/new-blog', 'BlogController@store');
Route::post('/edit/{blog}', 'BlogController@update');
Route::post('/delete/{blog}', 'BlogController@destroy');

Route::post('/new-comment/{blog}', 'CommentController@store');
