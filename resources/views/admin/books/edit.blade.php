@extends('layouts.app')

@section('content')
    <div>
        <div class="text-3xl mb-6">Edit book</div>

        <form method="POST"
              action="{{ route('admin.books.update', $book) }}"
              class="w-full max-w-lg"
              enctype="multipart/form-data"
        >
            {{ method_field('PATCH') }}

            @include('admin.books._form', ['btnText' => 'Update'])
        </form>

        <form method="POST"
              action="{{ route('admin.books.destroy', $book->isbn) }}"
              id="delete-form"
              class="hidden"
        >
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </div>
@endsection
