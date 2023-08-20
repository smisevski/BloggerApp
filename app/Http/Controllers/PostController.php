<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Services\Contracts\IBloggerService;
use App\Services\Implementations\BloggerService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private BloggerService $bloggerService;

    public function __construct(IBloggerService $bloggerService)
    {

        $this->bloggerService = $bloggerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function getAllPosts()
    {
        $posts = $this->bloggerService->getAllPosts();
        return response()->json($posts);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->bloggerService->getUserPosts();
        return view('blog.dashboard')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = $this->bloggerService->addPost($request);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = $this->bloggerService->getPostById($post->id);
        return view('blog.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = $this->bloggerService->getPostById($post->id);
        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $res = $this->bloggerService->updatePost($request, $post->id);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $res = $this->bloggerService->removePost($post->id);
        if ($res) return redirect()->route('post.index');

    }
}
