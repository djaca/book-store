<div class="bg-white mb-4 p-4 flex">
  <div class="lg:w-32 lg:h-48">
    <a href="{{ route('show', $book->isbn) }}">
      <img class="h-full w-full" src="{{ $book->img }}" alt="{{ $book->tile }}">
    </a>
  </div>

  <div class="w-full flex-1 mx-4">
    <div class="text-2xl mb-3">
      <a href="{{ route('show', $book) }}" class="no-underline hover:text-grey-dark text-grey-darker">{{ $book->title }}</a>
    </div>
    <div class="text-sm text-grey-darker mb-6">
      By: @include('books._authors', ['authors' => $book->authors])
    </div>
    <div>{!! str_limit($book->description, 300) !!}</div>
  </div>

  <div class="lg:w-32 lg:h-48 flex flex-col justify-between">
    <div class="text-2xl">${{ $book->price }}</div>

    <div>
      <button class="bg-grey hover:bg-grey-dark text-white text-sm font-bold py-2 px-4 rounded w-full">
        Add to cart
      </button>
    </div>
  </div>
</div>
