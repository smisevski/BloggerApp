<?php

namespace App\Repositories\Implementation;

use App\Repositories\Contracts\IPostRepository;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
class PostRepository implements IPostRepository
{

    private Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function get($id = null): Collection|Post
    {
        if ($id != null && gettype($id) == 'integer') {
            return $this->post::find($id);
        }
        return $this->post::all();
    }

    public function add($request): int
    {
        $post = $this->post::create([
            'category' => $request['category'],
            'title' => $request['title'],
            'body'  => $request['body'],
            'user_id' => $request['user_id'],
        ]);

        return $post->id;
    }

    public function update($request, $id): int
    {
        return $this->post::find($id)->update([
            'category' => $request['category'],
            'title' => $request['title'],
            'body'  => $request['body'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function delete($id): int
    {
        return $this->post::find($id)->delete();
    }


    public function addMultiple(array $posts): bool
    {
        $this->post::insert($posts);
        return true;
    }
}
