<?php

namespace App\Http\Controllers;

use App\Book;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * @var \Cart
     */
    protected $cart;

    /**
     * CartController constructor.
     *
     * @param \Gloudemans\Shoppingcart\Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = $this->cart->content();

        return view('cart.index', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cart->add($request->id, $request->title, 1, $request->price)->associate(Book::class);

        flash()->success('Item was added to your cart!');
        return redirect()->route('cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            flash()->error('Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }

        $this->cart->update($id, $request->quantity);

        flash()->success('Quantity updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cart->remove($id);

        flash()->success('Item has been removed');
        return back();
    }

    /**
     * Empty cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emptyCart()
    {
        $this->cart->destroy();

        flash()->success('Your cart has been cleared');
        return back();
    }
}
