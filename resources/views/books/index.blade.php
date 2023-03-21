@extends('layouts.app')

@section('content')
<div class="row justify-content-between align-items-center mb-3">
    <h1 class="col-sm-6 col-lg-8 mb-0">Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm col-sm-6 col-lg-4 mb-3 mb-sm-0">Add Book</a>   
        
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>    
                <th>Publisher</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->price }}</td> 
                    <td>{{ $book->stock }}</td>
                    <td>@foreach ($book->categories as $category)
                        {{ $category->name }}
                        @if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm mr-2">
                            Edit
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection