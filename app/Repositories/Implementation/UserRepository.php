<?php

namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserRepository implements IUserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($id = null): Collection|User
    {
        return $this->user::find(\Auth::user()->id);
    }

    public function add(Request $request): int
    {
        return 0;
    }

    public function update(Request $request, int $id): int
    {
        return 0;
    }

    public function delete(int $id): int
    {
        return 0;
    }
}
