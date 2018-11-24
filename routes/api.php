<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Retrieve Pages: api/pages
Route::get('pages', 'PageController@index');

// Retrieve Posts: api/posts
Route::get('posts', 'PostController@index');
Route::get('/posts/{category}', 'PostController@category');
Route::get('/posts/author/{author}', 'PostController@author');
Route::get('/post/{slug}', 'PostController@show');

// Retrieve Single Page: api/{page-slug}
Route::get('/{slug}', 'PageController@page');
