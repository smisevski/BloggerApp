<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Services\Contracts\IBloggerService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    private IBloggerService $bloggerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IBloggerService $bloggerService)
    {

        $this->bloggerService = $bloggerService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->bloggerService->getAllPosts();
        return view('blog.frontendGrid')->with('posts', $posts);
    }

    public function showPost(int $id)
    {
        $post = $this->bloggerService->getPostById($id);
        return view('blog.show')->with('post', $post);
    }
}
