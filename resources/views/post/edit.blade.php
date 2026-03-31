@extends('layouts.main')

@section('contents')
    <form action="{{ route('post.update', $post) }}" method="post">
        @csrf
        @method('patch')
        <h1>Edit post</h1>
        <ul>
            <li><h6><b>Title:</b> {{ $post->title }}</h6></li>
            <li><h6><b>Content:</b> {{ $post->content }}</h6></li>
            <li><h6><b>Image:</b> {{ $post->image }}</h6></li>
        </ul>
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">New title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">New content</label>
            <textarea type="text" name="content" id="title" class="form-control">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">New image</label>
            <input type="text" name="image" id="title" class="form-control" value="{{ $post->image }}">
        </div>

        <label for="title" class="form-label">category</label>
        <select name="category_id" class="form-select form-select-sm" aria-label="Small select example">
            @foreach($categories as $category)
                <option
                    {{ $category->id === $post->category_id ? 'selected' : ''}}
                    value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>

    <a type="submit" href="{{ route('post.show', $post) }}" class="btn btn-danger mt-2">Back</a>
@endsection
