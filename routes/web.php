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


Route::get('/', 'BlogController@index')->name('blogs.index');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('blogs', 'BlogController@index')->name('blogs.index');
Route::get('blogs/create', 'BlogController@create')->name('blogs.create')->middleware('auth');
Route::post('blogs', 'BlogController@store')->name('blogs.store')->middleware('auth');
Route::put('blogs/update/{id}', 'BlogController@update')->name('blogs.update')->middleware('blogOwner');
Route::get('blogs/edit/{id}', 'BlogController@edit')->name('blogs.edit')->middleware('blogOwner');
Route::get('blogs/{id}', 'BlogController@show')->name('blogs.show');
Route::delete('blogs/{id}', 'BlogController@destroy')->name('blogs.destroy')->middleware('blogOwner');

Route::get('posts', 'PostController@index')->name('posts.index');
Route::post('posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::put('posts/update/{id}', 'PostController@update')->name('posts.update')->middleware('postOwner');
Route::get('posts/edit/{id}', 'PostController@edit')->name('posts.edit')->middleware('postOwner');
Route::get('posts/create/{id}', 'PostController@create')->name('posts.create')->middleware('auth')->middleware('blogOwner');
Route::get('posts/{id}', 'PostController@show')->name('posts.show')->middleware('auth');
Route::delete('posts/{id}', 'PostController@destroy')->name('posts.destroy')->middleware('postOwner');

Route::get('comments', 'CommentController@index')->name('comments.index');
Route::get('comments/{id}', 'CommentController@user')->name('comments.user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
