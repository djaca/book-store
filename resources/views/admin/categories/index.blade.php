@extends('layouts.app')

@section('content')
    <div>
        @unless ($categories->isEmpty())
            <div class="text-3xl mb-6">Categories</div>

            <table class="my-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('admin.categories.edit', $category->slug) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-between">
                <div>{{ $categories->links('vendor/pagination/default') }}</div>
                <div><a href="{{ route('admin.categories.create') }}" class="btn btn-blue">Add</a></div>
            </div>
        @else
            <div class="text-3xl mb-6">No categories yet</div>
        @endunless
    </div>
@endsection
