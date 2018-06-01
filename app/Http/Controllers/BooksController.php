<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Category|null $category
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category = null)
    {
        $books = Book::forCategory($category)->select('img', 'isbn')->paginate(20);

        return view('books.index', compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }
}
