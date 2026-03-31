@extends('layouts.main')

@section('contents')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">content</label>
            <input type="text" name="content" id="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">image</label>
            <input type="text" name="image" id="title" class="form-control">
        </div>

        <label for="title" class="form-label">category</label>
        <select name="category_id" class="form-select form-select-sm" aria-label="Small select example">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-3">Publish</button>
    </form>
@endsection
