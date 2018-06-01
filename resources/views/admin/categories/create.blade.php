@extends('layouts.app')

@section('content')
    <div>
        <div class="text-3xl mb-6">Create category</div>

        <form method="POST"
              action="{{ route('admin.categories.store') }}"
              class="w-full max-w-lg"
        >

            @include('admin.categories._form')
        </form>
    </div>
@endsection
