<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(30);

        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        //
    }

    public function destroy(Post $post)
    {
       //
    }

    public function edit(Post $post)
    {
        //
    }

    public function show(Post $post)
    {
        $posts = Post::paginate();
        return view('posts.show', compact('post', 'posts'));
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function update(StoreRequest $request, Post $post)
    {
        //
    }
}
