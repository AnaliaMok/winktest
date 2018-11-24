<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use App\Http\Resources\WinkPost as WinkPostResource;

class PostController extends Controller
{
    /**
     * Retrieves all posts [limit of 10]
     *
     * @return Array
     */
    public function index()
    {
        // TODO: Fix eager loading of select columns
        $posts = WinkPost::where('published', true)
            ->with(['author', 'tags'])
            ->orderBy('publish_date', 'desc')
            ->limit(10) // TODO: Make dynamic for load more button
            ->get();

        return WinkPostResource::collection($posts);
    }

    /**
     * Retrieves all posts related to a category
     *
     * @param String $category - category name
     * @return Array
     */
    public function category($category)
    {
        // Retrieve Wink Tag First
        $tag = \Wink\WinkTag::where('slug', strtolower($category))
            ->first();

        // Get all published posts related to this tag
        $posts = $tag->posts()
                    ->where('published', true)
                    ->with('tags')
                    ->orderBy('publish_date', 'desc')
                    ->get();

        return WinkPostResource::collection($posts);
    }

    /**
     * Retrieves all posts related to an author
     *
     * @param String $author_id - Author's slug
     * @return Array
     */
    public function author($author_id)
    {
        $posts = WinkPost::with('tags')
            ->whereHas('author', function($query) use ($author_id){
                $query->where('slug', $author_id);
            })
            ->orderBy('published', true)
            ->limit(10)
            ->get();

        return WinkPostResource::collection($posts);
    }

    /**
     * Retrieves a single post by its slug
     *
     * @param String $slug
     * @return Object
     */
    public function show($slug)
    {
        $post = WinkPost::where('slug', $slug)->first();

        if ($post === null)
        {
            abort(404);
        }

        return WinkPostResource::make($post);
    }

    /// Web Routes

    /**
     * Returns view for displaying single post
     *
     * @param String $slug - post slug
     * @return View
     */
    public function showPost($slug)
    {
        $post = WinkPost::where('slug', $slug)
            ->with(['author', 'tags'])
            ->first();

        // Published Date
        $publish_date = new \Carbon\Carbon($post->publish_date);

        // Create Breadcrumb
        $breadcrumb = ['blog' => '/blog'];
        if (count($post->tags) > 0) {
            $breadcrumb['category'] = [
                'name' => ucfirst($post->tags[0]->name),
                'link' => '/blog/category/' . strtolower($post->tags[0]->name),
            ];
        }

        $data = [
            'breadcrumb'    => $breadcrumb,
            'post'          => $post,
            'publish_date'  => $publish_date->toFormattedDateString(),
            'author_slug'   => strtolower(str_replace(' ', '-', $post->author->name)),
            'image_caption' => strlen($post->featured_image_caption) > 0 ? $post->featured_image_caption : $post->title
        ];

        if ($post === null)
        {
            abort(404);
        }

        return view('blog.post', $data);
    }

    public function showAuthor($author_id)
    {
        $author_name = ucwords(str_replace('-', ' ', $author_id));

        $data = [
            'author_name'   => $author_name,
            'author_slug'   => $author_id,
        ];

        return view('blog.author', $data);
    }

    public function showCategory($category)
    {
        return view('blog.category', ['category' => ucfirst($category)]);
    }
}
