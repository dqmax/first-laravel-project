@extends('layouts.main')

@section('contents')

    <h1>List of current posts: </h1>
    @foreach($posts as $post)
        {{ $post->id }}. <a class="link-offset-2 link-underline link-underline-opacity-0"
                            href="{{ route('posts.show', $post) }}">{{ $post->title }}</a> <br>
    @endforeach

    <div class="mt-2">
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection
