@extends('layouts.main')

@section('contents')
    <h3>Category: {{ $category->title }}</h3>

    @foreach($posts as $post)
        @if ($category->id === $post->category_id)
            {{ $post->id }}. <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('post.show', $post) }}">{{ $post->title }}</a> <br>
        @endif
    @endforeach

    <a type="submit" href="{{ route('post.index', $post) }}" class="btn btn-danger mt-2">Back</a>
@endsection
