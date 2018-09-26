@foreach($book->authors as $author)
  <a
    href="{{ route('by.author', $author->slug) }}"
    class="no-underline hover:text-grey-dark text-grey-darker"
  >
    {{ $author->name }}</a><span>{{ $loop->last ? '' : ', ' }}
        </span>
@endforeach
