@extends('layouts.main')

@section('contents')
    <h2><b>Title:</b> {{ $post->title }} </h2>
    <h5><b>Content:</b> {{ $post->content }} </h5>
    <h5><b>Image:</b> {{ $post->image }} </h5>


    <a type="submit" href="{{ route('post.index') }}" class="btn btn-primary mt-2">Back</a>
    <a type="submit" href="{{ route('post.edit', $post) }}" class="btn btn-secondary mt-2">Edit</a>

    <form action="{{ route('post.delete', $post) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger mt-2">
    </form>

    <img src="{{ asset('images/' . $post->image)}}" class="mt-4" alt="Image">

@endsection
