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
        // Category table id
        $category_id = \Wink\WinkTag::where('slug', $category)
            ->select('id')
            ->get();

        // Retrieve only published posts and order by
        $posts = WinkPost::with(['tags' => function ($query) use ($category) {
                $query->where('slug', '=', strtolower($category));
            }])
            ->where('published', '=', true)
            ->orderBy('publish_date', 'desc')
            ->get();

        return WinkPostResource::collection($posts);
    }
}
