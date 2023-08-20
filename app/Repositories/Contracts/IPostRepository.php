<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IPostRepository
{
    public function get($id): Collection|Post;
    public function add(Request $request): int;
    public function addMultiple(array $posts): bool;
    public function update(Request $request, int $id): int;
    public function delete(int $id): int;
}
