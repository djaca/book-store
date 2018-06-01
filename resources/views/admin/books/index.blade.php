@extends('layouts.app')

@section('content')
    <div>
        @unless ($books->isEmpty())
            <div class="text-3xl mb-6">Books</div>

            <table class="my-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>In Stock</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td><a href="{{ route('book', $book->isbn) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->in_stock }}</td>
                        <td><a href="{{ route('admin.books.edit', $book->isbn) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-between">
                <div>{{ $books->links('vendor/pagination/default') }}</div>
                <div><a href="{{ route('admin.books.create') }}" class="btn btn-blue">Add</a></div>
            </div>
        @else
            <div class="text-3xl mb-6">No books yet</div>
        @endunless
    </div>
@endsection
