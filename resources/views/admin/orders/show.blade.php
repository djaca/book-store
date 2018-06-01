@extends('layouts.app')

@section('content')
    <div>
        <div class="mb-6 flex justify-between">
            <span class="text-3xl">Order No. {{ $order->id }}</span>
            <span>User:
                <a href="{{ route('admin.users.show', $order->customer->user->username) }}">
                    {{ $order->customer->user->username }}
                </a>
            </span>
        </div>

        <table class="my-table">
            <thead>
            <tr>
                <th>Book</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>${{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <div class="text-2xl mb-4">Ship details</div>
            <ul>
                <li>Name: {{ $order->ship_name }}</li>
                <li>Address: {{ $order->ship_address }}</li>
                <li>City: {{ $order->ship_city }}</li>
                <li>Zip: {{ $order->ship_zip }}</li>
                <li>Country: {{ $order->ship_country }}</li>
            </ul>
        </div>
    </div>
@endsection
