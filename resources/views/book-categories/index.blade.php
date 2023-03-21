@extends('layouts.app')

@section('content')
    <h1>Book Categories</h1>
    <a href="{{ route('book-categories.create') }}" class="btn btn-primary">Create New</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent ? $category->parent->name : '-' }}</td>
                    <td>
                        <a href="{{ route('book-categories.edit', $category) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('book-categories.destroy', $category) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection