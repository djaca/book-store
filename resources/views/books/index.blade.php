@extends('layouts.app')

@section('content')
    <div class="min-h-screen md:flex">
        <div class="flex-none w-1/5 md:max-w-xs text-white text-sm">
            <ul class="list-reset leading-loose">
                @foreach($categories as $slug => $name)
                    <li>
                        <a
                          href="{{ route('by.category', $slug) }}"
                          class="text-blue hover:text-blue-darker no-underline"
                        >
                          {{ $name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex-1">
            @unless ($books->isEmpty())
                <div class="">
                    @each('books._card', $books, 'book')
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
