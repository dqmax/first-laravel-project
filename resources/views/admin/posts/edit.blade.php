@extends('admin.layouts.main')

@section('admin-contents')
    <form action="{{ route('admin.posts.update', $post) }}" method="post">
        @csrf
        @method('patch')
        <h1>Edit post</h1>
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

        <label for="title" class="form-label mt-3">tags (choose one or more)</label>
        <select class="form-select" id="tags" name="tags[]" multiple aria-label="Multiple select example">
            @foreach($tags as $tag)
                <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : ''}}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>

    <a type="submit" href="{{ route('admin.posts.show', $post) }}" class="btn btn-secondary mt-2">Back</a>
@endsection
