<?php

namespace App\Services\Implementations;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Contracts\IPostRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Implementation\PostRepository;
use App\Services\Contracts\IBloggerService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BloggerService implements IBloggerService
{
    private PostRepository $postRepository;
    private IUserRepository $userRepository;

    public function __construct(IPostRepository $postRepository, IUserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }


    public function getAllPosts(): Collection
    {
        return $this->postRepository->get();
    }

    public function getPostById($id): Post
    {
        return $this->postRepository->get($id);
    }

    public function addPost($request): int
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);
        return $this->postRepository->add($request);
    }

    public function updatePost($request, $id): int
    {
        return $this->postRepository->update($request, $id);
    }

    public function removePost($id): int
    {
        return $this->postRepository->delete($id);
    }

    public function getUserPosts(): Collection
    {
        $user = $this->userRepository->get();
        return $user->posts()->get();
    }

    public function addMultiplePosts(array $posts): bool
    {
        $this->postRepository->addMultiple($posts);
        return true;
    }
}
