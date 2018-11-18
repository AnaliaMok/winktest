<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class PostController extends Controller
{
    public function index()
    {
        $posts = WinkPost::where('published', true)->get();

        return view('blog.index', ['posts' => $posts]);
    }
}
