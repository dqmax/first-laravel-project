@extends('layouts.main')

@section('contents')
    <h1>Lists of current posts: </h1>
    Categories:
    @foreach($categories as $category)
        <a href="{{ route('post.category', $category) }}">{{ $category->title }}</a>
    @endforeach
    <br>
    @foreach($posts as $post)
        {{ $post->id }}. <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('post.show', $post) }}">{{ $post->title }}</a> <br>
    @endforeach

    <a type="submit" href="{{ route('post.create') }}" class="btn btn-warning mt-3">New post</a>
@endsection
