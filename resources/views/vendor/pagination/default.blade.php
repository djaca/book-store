@if ($paginator->hasPages())
    <ul class="flex w-auto list-reset font-sans" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="block text-black border-t border-b border-l border-grey-light px-3 py-2 cursor-not-allowed" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a class="block hover:text-white hover:bg-blue text-blue border-t border-b border-l border-grey-light px-3 py-2" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true"><span class="block text-blue border-t border-b border-grey-light px-3 py-2">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><span class="block text-white bg-blue border-t border-b px-3 py-2 cursor-not-allowed">{{ $page }}</span></li>
                    @else
                        <li><a class="block hover:text-white hover:bg-blue text-blue border-t border-b border-grey-light px-3 py-2" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="block hover:text-white hover:bg-blue text-blue border-t border-b border-r border-grey-light px-3 py-2" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="block text-black border-t border-b border-r border-grey-light px-3 py-2 cursor-not-allowed" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
