@extends('layouts.app')

@section('content')
    <div>
        @unless ($orders->isEmpty())
            <div class="text-2xl">Your orders:</div>

            <div class="mt-6">
                <table class="my-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>${{ $order->amount }}</td>
                            <td><a href="{{ route('orders.show', $order->id) }}">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-2xl">You don`t have any orders</div>
        @endunless
    </div>
@endsection
