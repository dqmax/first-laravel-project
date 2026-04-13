<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\PostService;

class PostController extends BaseController
{
    public function index(FilterRequest $request, PostFilter $filter)
    {
        $data = $request->validated();

        $posts = Post::filter($filter)->paginate(25);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'posts'));
    }

    public function show(Post $post)
    {
        $posts = Post::paginate();
        return view('admin.posts.show', compact('post', 'posts'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.posts.index');
    }

    public function update(StoreRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route('admin.posts.show', $post);
    }
}
