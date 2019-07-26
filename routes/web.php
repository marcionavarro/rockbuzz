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

Route::resource('/categorias', 'CategoriesController');

Route::resource('/posts', 'PostsController');
Route::get('/posts-na-lixeira', 'PostsController@trashed')->name('posts-na-lixeira.index');
Route::put('/restaurar-post/{post}', 'PostsController@restore')->name('restaurar-post');

