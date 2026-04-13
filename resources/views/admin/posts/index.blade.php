@extends('admin.layouts.main')

@section('admin-contents')
    <h1>Lists of current posts: </h1>
    <a type="submit" href="{{ route('admin.posts.create') }}" class="btn btn-warning  mb-2">New post</a>
    <br>
    @foreach($posts as $post)
        {{ $post->id }}. <a class="link-offset-2 link-underline link-underline-opacity-0"
        href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a> <br>
    @endforeach

    <div class="mt-2">
        {{ $posts->withQueryString()->links() }}
    </div>

@endsection
