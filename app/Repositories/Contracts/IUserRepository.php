<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IUserRepository
{
    public function get($id): Collection|User;
    public function add(Request $request): int;
    public function update(Request $request, int $id): int;
    public function delete(int $id): int;
}
