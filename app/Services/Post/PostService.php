<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);

        $post->tags()->sync($tags);
    }
}
