@extends('admin.layouts.main')

@section('admin-contents')
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <h1>Create post</h1>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">content</label>
            <input type="text" name="content" id="title" class="form-control" value="{{ old('content') }}">
            @error('content')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">image</label>
            <input type="text" name="image" id="title" class="form-control" value="{{ old('image') }}">
            @error('image')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label for="title" class="form-label">category</label>
        <select name="category_id" class="form-select form-select-sm" aria-label="Small select example">
            @foreach($categories as $category)
                <option
                    {{ old('category_id') == $category->id ? 'selected' : ''}}
                    value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <label for="title" class="form-label mt-3">tags (at least one)</label>
        <select class="form-select" id="tags" name="tags[]" multiple aria-label="Multiple select example">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        @error('tags')
        <p class="text-danger mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">Publish</button>
        <a type="submit" href="{{ route('admin.posts.index') }}" class="btn btn-danger mt-3">Back</a>

    </form>
@endsection
