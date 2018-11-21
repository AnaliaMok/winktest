<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Retrieve Pages: api/pages
Route::get('pages', 'PageController@index');

// Retrieve Posts: api/posts
Route::get('posts', 'PostController@index');

// Retrieve Single Page: api/{page-slug}
Route::get('/{slug}', 'PageController@page');
