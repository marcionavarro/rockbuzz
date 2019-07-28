<?php
// use Symfony\Component\Routing\Annotation\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('categorias', 'CategoriesController');

    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController');

    Route::get('posts-na-lixeira', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('restaurar-post/{post}', 'PostsController@restore')->name('restore-posts');
});

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('usuarios/editar-perfil', 'UserController@edit')->name('users.edit-profile');
    Route::put('usuarios/perfil', 'UserController@update')->name('users.update-profile');
    Route::get('usuarios', 'UserController@index')->name('users.index');
    Route::post('usuarios/{user}/mudar-admin', 'UserController@makeAdmin')->name('users.make-admin');
});
