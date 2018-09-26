<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;

class BooksController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * @param \App\Category $category
     *
     * @return \Illuminate\View\View
     */
    public function filterByCategory(Category $category)
    {
        $books = $category->books()->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * @param \App\Author $author
     *
     * @return \Illuminate\View\View
     */
    public function filterByAuthor(Author $author)
    {
        $books = $author->books()->paginate(10);

        return view('books.index', compact('books'));
    }
}
