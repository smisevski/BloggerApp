<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IBloggerService
{
    public function getAllPosts(): Collection;
    public function getPostById(int $id): Post;
    public function addPost(Request $request): int;
    public function addMultiplePosts(array $posts): bool;
    public function updatePost(Request $request, int $id): int;
    public function removePost(int $id): int;
    public function getUserPosts(): Collection;
}
