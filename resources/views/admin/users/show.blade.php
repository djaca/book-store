@extends('layouts.app')

@section('content')
    <div>
        <div class="mt-6">
            <div class="text-2xl mb-4">{{ $user->username }}</div>
            <ul>
                <li>Email: {{ $user->email }}</li>
                <li>Joined: {{ $user->created_at->diffForHumans() }}</li>
            </ul>
        </div>

        @if($orders)
            <table class="my-table">
                <thead>
                <tr>
                    <th>Ship details</th>
                    <th>Amount</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <ul>
                                <li>Order number: {{ $order->id }}</li>
                                <li>Name: {{ $order->ship_name }}</li>
                                <li>Address: {{ $order->ship_address }}</li>
                                <li>City: {{ $order->ship_city }}</li>
                                <li>Zip: {{ $order->ship_zip }}</li>
                                <li>Country: {{ $order->ship_country }}</li>
                            </ul>
                        </td>
                        <td>{{ $order->amount }}</td>
                        <td>
                            @foreach($order->items as $item)
                                <ul>
                                    <li><a href="{{ route('book', $item->book->isbn) }}">{{ $item->book->title }}</a></li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->items as $item)
                                <ul>
                                    <li>{{ $item->quantity }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ $order->created_at->toFormattedDateString() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $orders->links('vendor/pagination/default') }}
        @endif
    </div>
@endsection
