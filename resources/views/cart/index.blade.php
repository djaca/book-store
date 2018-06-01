@extends('layouts.app')

@section('content')
    <div class="min-h-screen">
        @if (sizeof($cart) > 0)
            <table class="w-full text-left p-4" style="border-collapse:collapse">
                <tbody>
                @foreach ($cart as $item)
                    @php $book = $item->model @endphp

                    <tr>
                        <td class="w-24 h-32">
                            <img src="{{ asset('books' . $book->img) }}" alt="product" class="h-full w-full">
                        </td>
                        <td class="py-2 px-6">
                            <a href="{{ route('book', [$book->isbn]) }}">{{ $item->name }}</a>
                        </td>
                        <td class="py-2 px-6">
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @php $num = $book->in_stock < 5 ? $book->in_stock : 5 @endphp

                                @for($i = 1; $i <= $num; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="py-2 px-6">${{ $item->subtotal }}</td>
                        <td></td>
                        <td class="py-2 px-6">
                            <a href="#"
                               class="btn btn-red"
                               onclick="event.preventDefault();
                                    document.getElementById('destroy-cart-form').submit();">Remove</a>

                            <form action="{{ route('cart.destroy', $item->rowId) }}"
                                  method="POST"
                                  id="destroy-cart-form"
                                  class="side-by-side"
                            >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="border-t-2">
                    <td></td>
                    <td></td>
                    <td class="py-2 px-6 text-right">Subtotal</td>
                    <td class="py-2 px-6">${{ Cart::subtotal() }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="py-2 px-6 text-right">Tax</td>
                    <td class="py-2 px-6">${{ Cart::tax() }}</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class="border-b-2">
                    <td></td>
                    <td></td>
                    <td class="py-2 px-6 text-right">Your Total</td>
                    <td class="py-2 px-6">${{ Cart::total() }}</td>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>

            <div class="mt-6 flex justify-between">
                <div>
                    <a href="{{ route('books') }}" class="btn btn-blue">Continue Shopping</a> &nbsp;
                    <a href="{{ route('checkout') }}" class="btn btn-blue">Proceed to Checkout</a>
                </div>

                <div>
                    <a href="{{ route('cart.empty') }}"
                       class="btn btn-red"
                       onclick="event.preventDefault();
                                    document.getElementById('empty-cart-form').submit();">Empty Cart</a>
                    <form id="empty-cart-form" action="{{ route('cart.empty') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </div>
        @else
            <div class="text-3xl mb-3">You have no items in your shopping cart</div>
            <a href="{{ route('books') }}" class="btn btn-blue">Continue Shopping</a>
        @endif
    </div>
@endsection

@section('js')
    <script>
        let userSelection = document.getElementsByClassName('quantity')

        for (let i = 0; i < userSelection.length; i++) {
            userSelection[i].addEventListener("change", (e) => {
                let quantity = e.target.options[e.target.selectedIndex].text
                let id = e.target.getAttribute('data-id')

                axios('/cart/' + id, {method: 'POST', data: {quantity, _method: 'PATCH'}})
                    .then(resp => {
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(err => console.log('Error: ' + err))
            })
        }
    </script>
@endsection
