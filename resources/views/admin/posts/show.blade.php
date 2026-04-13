@extends('admin.layouts.main')

@section('admin-contents')
    <h2><b>Title:</b> {{ $post->title }} </h2>
    <h5><b>Content:</b> {{ $post->content }} </h5>

    <a type="submit" href="{{ route('admin.posts.index') }}" class="btn btn-primary mt-2">Back</a>
    <a type="submit" href="{{ route('admin.posts.edit', $post) }}" class="btn btn-secondary mt-2">Edit</a>

    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger mt-2">
    </form>

    <img src="{{ $post->image }}" class="mt-4" alt="Image">

@endsection
