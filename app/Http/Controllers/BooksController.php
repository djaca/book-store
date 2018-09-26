<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->paginate(10);

        $categories = Category::pluck('name', 'slug');

        return view('books.index', compact('books', 'categories'));
    }
}
