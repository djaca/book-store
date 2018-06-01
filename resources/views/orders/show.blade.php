@extends('layouts.app')

@section('content')
    <div>
        <div class="mt-6">
            <div class="text-2xl mb-4">Order details</div>
            <ul>
                <li>Order number: {{ $order->id }}</li>
                <li>Name: {{ $order->ship_name }}</li>
                <li>Address: {{ $order->ship_address }}</li>
                <li>City: {{ $order->ship_city }}</li>
                <li>Zip: {{ $order->ship_zip }}</li>
                <li>Country: {{ $order->ship_country }}</li>
            </ul>
        </div>

        <div class="mt-6">
            <table class="my-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
