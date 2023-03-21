@extends('layouts.app')

@section('content')

<h1>Edit Book</h1>
<form action="{{ route('books.update', $book) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $book->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="publisher_id">Publisher</label>
        <select name="publisher_id" id="publisher_id" class="form-control">
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control" value="{{ $book->price }}">
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="text" name="stock" id="stock" class="form-control" value="{{ $book->stock }}">
    </div>

    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="categories[]" id="categories" class="form-control" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection