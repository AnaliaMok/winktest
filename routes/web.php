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

Route::get('blog', 'PageController@showBlog');
Route::get('blog/{slug}', 'PostController@showPost');
Route::get('blog/author/{author_id}', 'PostController@showAuthor');
Route::get('blog/category/{category}', 'PostController@showCategory');
