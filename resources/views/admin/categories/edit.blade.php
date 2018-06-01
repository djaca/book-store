@extends('layouts.app')

@section('content')
    <div>
        <div class="text-3xl mb-6">Edit category</div>

        <form method="POST"
              action="{{ route('admin.categories.update', $category->slug) }}"
              class="w-full max-w-lg"
        >
            {{ method_field('PATCH') }}

            @include('admin.categories._form', ['btnText' => 'Update'])
        </form>

        <form method="POST"
              action="{{ route('admin.categories.destroy', $category->slug) }}"
              id="delete-form"
              class="hidden"
        >
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </div>
@endsection

@section('js')
    <script>
        function showConfirmBox(event) {
            event.preventDefault()
            if (confirm("Are you sure? Books will be deleted, too!")) {
                document.getElementById('delete-form').submit()
            }
        }
    </script>
@endsection
