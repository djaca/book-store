<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class BooksController extends Controller
{
    /**
     * @var \App\Book
     */
    protected $book;

    /**
     * BooksController constructor.
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->latest()->select('title', 'author', 'isbn', 'in_stock')->paginate(20);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create', ['book' => $this->book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => [
                'required',
                Rule::exists('categories', 'slug'),
            ],
            'isbn' => 'required|unique:books',
            'price' => 'required|numeric',
            'in_stock' => 'required|integer',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $this->book->addBook($request->all());

        flash()->success('Book added successfully');
        return redirect()->route('admin.books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $book
     *
     * @return \Illuminate\View\View
     */
    public function edit(Book $book)
    {
        $book->load('category');

        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Book $book
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category' => 'required',
            'isbn' => ['required', Rule::unique('books')->ignore($book->id)],
            'price' => 'required',
            'in_stock' => 'required|integer',
            'img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $book->updateBook($request->all());

        flash()->success('Book updated successfully');
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        $img = public_path('books') . $book->img;
        $book->delete();

        if(File::exists($img)) {
            File::delete($img);
        }

        flash()->success('Book deleted successfully');
        return redirect()->route('admin.books.index');
    }
}
