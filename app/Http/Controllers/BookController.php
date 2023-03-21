<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BookController extends Controller
{   
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = BookCategory::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $book = new Book();

        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->stock = $request->stock;

        $book->save();

        $book->categories()->sync($request->categories);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $categories = BookCategory::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->stock = $request->stock;

        $book->save();

        $book->categories()->sync($request->categories);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();

        return redirect()->route('books.index');
    }
}
