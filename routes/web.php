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

Route::get('/blogs', 'BlogController@index')->name('blogs.index');
Route::get('blogs/create', 'BlogController@create')->name('blogs.create');
Route::post('blogs', 'BlogController@store')->name('blogs.store');
Route::get('/blogs/{id}', 'BlogController@show')->name('blogs.show');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users', 'UserController@store')->name('users.store');
Route::get('/users/{id}', 'UserController@show')->name('users.show');

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('posts/create/{id}', 'PostController@create')->name('posts.create');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{id}', 'PostController@show')->name('posts.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
