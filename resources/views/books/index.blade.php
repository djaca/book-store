@extends('layouts.app')

@section('content')
    <div class="min-h-screen md:flex">
        <div class="flex-none w-1/5 md:max-w-xs text-white text-sm">
            <ul class="list-reset leading-loose">
                @foreach($categories as $slug => $name)
                    <li>
                        <a href="{{ route('category', $slug) }}" class="text-blue hover:text-blue-darker">{{ $name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex-1 text-white">
            @unless ($books->isEmpty())
                <div class="flex flex-1 flex-wrap -mx-2">
                    @foreach($books as $book)
                        <div class="rounded px-2 overflow-hidden w-1/5 my-2">
                            <a href="{{ route('book', $book->isbn) }}">
                                <img class="h-full w-full" src="{{ asset('books').$book->img }}" alt="{{ $book->tile }}">
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center">
                    {{ $books->links('vendor/pagination/default') }}
                </div>
            @else
                <p class="text-3xl text-black">No books</p>
            @endunless
        </div>
    </div>
@endsection
