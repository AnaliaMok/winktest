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

    public function category($category)
    {
        // Retrieve Wink Tag First
        $tag = \Wink\WinkTag::where('slug', strtolower($category))->first();

        // Get all published posts related to this tag
        $posts = $tag->posts()->where('published', true)->orderBy('publish_date', 'desc')->get();

        return WinkPostResource::collection($posts);
    }
}
