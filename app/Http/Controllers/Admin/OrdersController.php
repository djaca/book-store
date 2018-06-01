<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('customer')->latest()->select([
                'id',
                'created_at',
                'amount',
                'customer_id',
            ])->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     *
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        $order->load([
            'items',
            'items.book',
            'customer' => function ($query) {
                return $query->select('id', 'user_id');
            },
            'customer.user' => function ($query) {
                return $query->select('id', 'username');
            }
        ]);

        return view('admin.orders.show', compact('order'));
    }
}
