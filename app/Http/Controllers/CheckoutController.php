<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Auth;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * @var \App\Customer
     */
    protected $customer;

    /**
     * Create a new controller instance.
     *
     * @param \App\Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->middleware('auth');
        $this->customer = $customer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Auth::user()->customer ?: $this->customer;

        return view('checkout.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->createOrder($request->all());

        foreach (Cart::content() as $item) {
            $order->items()->create([
                'book_id' => (int) $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        Cart::destroy();

        flash()->success('Your order has been processed successfully.');
        return redirect('/');
    }

    /**
     * Create order.
     *
     * @param $data
     *
     * @return \App\Order|\Illuminate\Database\Eloquent\Model
     */
    private function createOrder($data)
    {
        $customer = $this->customer->updateOrCreate(['user_id' => Auth::user()->id], $data);

        return Order::create([
            'customer_id' => $customer->id,
            'amount' => floatval(Cart::total()),
            'ship_name' => $data['first_name'].' '.$data['last_name'],
            'ship_address' => $data['address'],
            'ship_city' => $data['city'],
            'ship_zip' => $data['zip'],
            'ship_country' => $data['country']
        ]);
    }
}
