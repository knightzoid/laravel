@extends('layouts.app')

@section('content')
    <h1>Create New Book Category</h1>
    <form action="{{ route('book-categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
