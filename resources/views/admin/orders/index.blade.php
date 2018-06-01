@extends('layouts.app')

@section('content')
    <div>
        @unless($orders->isEmpty())
            <div class="text-3xl mb-6">Orders</div>

            <table class="my-table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->customer->first_name . ' ' . $order->customer->last_name }}</td>
                        <td>${{ $order->amount }}</td>
                        <td><a href="{{ route('admin.orders.show', $order->id) }}">Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex">
                <div>{{ $orders->links('vendor/pagination/default') }}</div>
            </div>
        @else
            <div class="text-3xl mb-6">No orders yet</div>
        @endunless
    </div>
@endsection
