@extends('layouts.app')

@section('content')
  <div class="min-h-screen sm:flex">
    <div class="flex-none sm:max-w-xs mr-8">
      <img src="{{ $book->img }}" alt="{{ $book->name }}">
    </div>

    <div class="flex-1 ml-8">
      <div class="text-3xl pb-3">
        {{ $book->title }}
      </div>

      <div class="mb-6">
        Author: @include('books._authors', ['authors' => $book->authors])
      </div>

      <div class="pb-8">{!! $book->description !!}</div>

      <div class="text-2xl">Book Details</div>

      <table class="my-6 w-full text-lg">
        <tbody>
        <tr class="leading-normal">
          <td>Price</td>
          <td>$ {{ $book->price }}</td>
        </tr>
        <tr class="leading-normal">
          <td>ISBN</td>
          <td>{{ $book->isbn }}</td>
        </tr>
        <tr class="leading-normal">
          <td>Category</td>
          <td>
            <a href="{{ route('by.category', $book->category->slug) }}" class="no-underline text-grey-darker hover:text-grey-dark">{{ $book->category->name }}</a>
          </td>
        </tr>
        </tbody>
      </table>

      <form method="POST" action="#">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $book->id }}">
        <input type="hidden" name="title" value="{{ $book->title }}">
        <input type="hidden" name="price" value="{{ $book->price }}">
        <button class="bg-grey hover:bg-grey-dark text-white text-sm font-bold py-2 px-4 rounded">Add to cart</button>
      </form>
    </div>
  </div>
@endsection
