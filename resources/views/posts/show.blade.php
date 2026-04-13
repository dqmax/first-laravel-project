@extends('layouts.main')

@section('contents')
    <h2><b>Title:</b> {{ $post->title }} </h2>
    <h5><b>Content:</b> {{ $post->content }} </h5>

    <img src="{{ $post->image }}" class="mt-1" alt="Image"><br>
    <a type="submit" href="{{ route('posts.index') }}" class="btn btn-primary mt-2">Back</a>
@endsection
