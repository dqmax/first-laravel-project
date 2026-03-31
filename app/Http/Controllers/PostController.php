<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));

//        $post = Post::find(2);
//        dump($post);
//        dump($post->title);

//        $post = Post::whereIsPublished(1)->first();
//        dump($post->title);

//        $post = Post::where('likes','>',0)->get();

//        dump($post);
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));

//        $postsArr = [
//            [
//                'title' => 'Blueberry Pineapple',
//                'content' => 'I like fruits',
//                'image' => 'view.img',
//                'is_published' => '0',
//                'likes' => 5220,
//            ],
//            [
//                'title' => 'North West',
//                'content' => 'Today is so cold',
//                'image' => 'img12354',
//                'is_published' => '1',
//                'likes' => 530,
//            ],
//        ];
//
//        foreach ($postsArr as $entry){
//            dump($entry);
//            // Post::create($entry);
//        }
//
////        Post::create([
////            'title' => 'Amazing title',
////            'content' => 'This is the post content',
////            'image' => 'img1553',
////            'likes' => 50,
////            'is_published' => 1,
////        ]);
//        dd('created');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
        ]);
        Post::create($data);

//        dump($data);

        return redirect()->route('post.index');

        //dd('Post created and stored');


//        Post::create([
//            'title' => $title,
//            'content' => $content,
//            'image' => $image,
//            'likes' => 0,
//            'is_published' => 1,
//        ]);
    }

    public function show(Post $post){
//        $category = Category::find(2);
//        $posts = Post::find(1);
//        $tags = Tag::find(1);
//
//        dump($category->posts);
//        dump($posts->category);

//        dump($posts->tags);
//        dump($tags->posts);

        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => '',
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post);
    }

//    public function update(){
//        $post = Post::find(7);
//        $post->update([
//            'title' => 'Mp3 Compatibility',
//            'content' => 'You are welcome',
//        ]);
//        dump($post);
//        dd('updated');
//    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index', $post);
    }

    public function category(Post $post, Category $category){
        $posts = Post::all();
        return view('post.category', compact('category', 'posts'));
    }

    public function delete(){
        $post = Post::withTrashed()->find(7);
        $post->restore();
//        $post->delete();
//        dd('deleted');
        dd('restored');
    }

    public function firstOrCreate(){
        $post = Post::firstOrCreate([
            'title' => 'Banana Smoothie',
        ],
            [
            'title' => 'Banana Smoothie',
            'content' => 'Sooo delicious',
            'image' => 'view.img',
            'is_published' => '1',
            'likes' => 5220,

        ]);

        dd($post->content);
    }

    public function updateOrCreate(){
        $post = Post::updateOrCreate([
            'title' => 'Amazing title',
        ],
            [
                'title' => 'New covenant',
                'content' => 'New covenant this year',
                'image' => 'image!!',
                'is_published' => '0',
                'likes' => 633,

            ]);

        dd($post->content);
    }
}
