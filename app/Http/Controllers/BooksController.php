<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(6);
        $categories = Category::pluck('name', 'slug');

        return view('books.index', compact('books', 'categories'));
    }
}
