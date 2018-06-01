<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->select('username', 'email')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        $orders = $user->customer
            ? Order::where('customer_id', $user->customer->id)->with(['items', 'items.book'])->paginate(5)
            : null;

        return view('admin.users.show', compact('user', 'orders'));
    }
}
