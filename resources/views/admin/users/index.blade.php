@extends('layouts.app')

@section('content')
    <div>
        @unless ($users->isEmpty())
            <div class="text-3xl mb-6">Users</div>

            <table class="my-table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('admin.users.show', $user->username) }}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6">{{ $users->links('vendor/pagination/default') }}</div>
        @else
            <div class="text-3xl mb-6">No users</div>
        @endunless
    </div>
@endsection
