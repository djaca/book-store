@extends('layouts.app')

@section('content')
    <div class="min-h-screen sm:flex">
        <div class="flex-none sm:max-w-xs mr-8">
            <img src="{{ asset('books').$book->img }}" alt="{{ $book->name }}">
        </div>

        <div class="flex-1 ml-8">
            <div class="text-3xl pb-3">
                {{ $book->title }}
            </div>

            <div class="mb-6">Category:
                <a href="{{ route('category', $book->category->slug) }}">{{ $book->category->name }}</a>
            </div>

            <div class="pb-8">{{ $book->description }}</div>

            <div class="text-3xl">Book Details</div>

            <table class="my-6 w-full text-xl">
                <tbody>
                @foreach(array_only($book->toArray(), ['isbn', 'author', 'price']) as $key => $value)
                    <tr class="leading-normal">
                        <td>{{ ucfirst($key)  }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <form method="POST" action="{{ route('cart.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="title" value="{{ $book->title }}">
                <input type="hidden" name="price" value="{{ $book->price }}">
                <button class="btn btn-blue">Add to cart</button>
            </form>
        </div>
    </div>
@endsection
