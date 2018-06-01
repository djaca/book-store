{{ csrf_field() }}

<div class="-mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="title">
            Book Title
        </label>
        <input type="text"
               name="title"
               value="{{ old('title', $book->title) }}"
               class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
               id="title">
        {!! $errors->first('title', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="author">
            Author
        </label>
        <input type="text"
               name="author"
               value="{{ old('author', $book->author) }}"
               class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
               id="author">
        {!! $errors->first('author', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>

    <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="category">
            Category
        </label>
        <div class="relative">
            <select name="category"
                    class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                    id="category">
                @foreach($categories as $slug => $category)
                    <option value="{{ $slug }}" {{ old('category', $book->category ? $book->category->slug : '') === $slug ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>
        {!! $errors->first('category', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>
</div>

<div class="-mx-3 mb-6">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2"
               for="description">
            Description
        </label>
        <textarea name="description"
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                  id="description" rows="10">{{ $book->description }}</textarea>
        {!! $errors->first('description', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="isbn">
            ISBN
        </label>
        <input type="text"
               name="isbn"
               value="{{ old('isbn', $book->isbn) }}"
               class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
               id="isbn">
        {!! $errors->first('isbn', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="price">
            Price
        </label>
        <input type="text"
               name="price"
               value="{{ old('price', $book->price) }}"
               class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
               id="price">
        {!! $errors->first('price', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="in_stock">
            In Stock
        </label>
        <input type="text"
               name="in_stock"
               value="{{ old('in_stock', $book->in_stock) }}"
               class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
               id="in_stock">
        {!! $errors->first('in_stock', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>
</div>

<div class="-mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="img">
            Image
        </label>
        <input type="file" name="img" id="img">
        {!! $errors->first('img', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
    </div>
</div>

<div>
    <button type="submit" class="btn btn-blue">{{ $btnText ?? 'Create' }} book</button>

    <a href="{{ route('admin.books.index') }}" class="btn btn-light">Cancel</a>

    @if($book->isbn)
        <a href="{{ route('admin.books.destroy', $book->isbn) }}"
           class="btn btn-red"
           onclick="event.preventDefault();document.getElementById('delete-form').submit();"
        >
            Delete
        </a>
    @endif
</div>
