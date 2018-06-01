{{ csrf_field() }}
    <div class="-mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                   id="name">
            {!! $errors->first('name', '<p class="text-red text-sm italic mt-1">:message</p>') !!}
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-blue">{{ $btnText ?? 'Add' }} category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Cancel</a>

        @if($category->slug)
            <a href="{{ route('admin.books.destroy', $category->slug) }}"
               class="btn btn-red"
               onclick="showConfirmBox(event)"
            >
                Delete
            </a>
        @endif
    </div>
