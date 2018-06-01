@extends('layouts.app')

@section('content')
    <div>
        <div class="text-3xl mb-6">Create book</div>

        <form method="POST"
              action="{{ route('admin.books.store') }}"
              class="w-full max-w-lg"
              enctype="multipart/form-data"
        >
            @include('admin.books._form')
        </form>
    </div>
@endsection
