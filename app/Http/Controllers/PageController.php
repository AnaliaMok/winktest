<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPage;
use App\Http\Resources\WinkPage as WinkPageResource;

class PageController extends Controller
{
    /// Web Routes
    // TODO: Will switch web routing using vue-route
    public function showBlog()
    {
        return view('blog.index');
    }

    public function showAuthor($author_id)
    {
        // TODO: MIght be moved to post controller
    }

    public function showCategory($category)
    {
        // TODO: MIght be moved to post controller
    }


    /// API Routes

    public function index()
    {
        $pages = WinkPage::get();

        return WinkPageResource::collection($pages);
    }

    public function page($slug)
    {
        $page = WinkPage::where('slug', $slug)->first();

        if($page === null)
        {
            abort(404);
        }

        return WinkPageResource::make($page);
    }
}
