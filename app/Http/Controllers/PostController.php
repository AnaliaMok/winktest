<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use App\Http\Resources\WinkPost as WinkPostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = WinkPost::where('published', true)->get();

        return WinkPostResource::collection($posts);
    }
}
