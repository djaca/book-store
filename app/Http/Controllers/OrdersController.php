<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
use Gate;

class OrdersController extends Controller
{
    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('customer_id', Auth::user()->customer->id)->latest()->get([
                'id',
                'created_at',
                'amount',
            ]);

        return view('orders.index', compact('orders'));
    }

    /**
     * @param \App\Order $order
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        if (Gate::denies('show-single-order', $order)) {
            flash()->warning('You don`t have permission');

            return redirect('/');
        }

        $order->load(['items', 'items.book']);

        return view('orders.show', compact('order'));
    }
}
