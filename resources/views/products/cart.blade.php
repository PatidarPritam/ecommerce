@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Your Shopping Cart</h2>
            @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach($cartItems as $cartItem)
                            <tr>
                                <td>{{ $cartItem->product->name }}</td>
                                <td>${{ $cartItem->product->price }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <td>
                                    <!-- Example form for removing a product from cart -->
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>   
                            </tr>
                            @php
                                $totalPrice += $cartItem->product->price * $cartItem->quantity;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
                    <!-- Example link for clearing the entire cart with confirmation -->
                    <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all items from your cart?');">
                        @csrf
                        <button type="submit" class="btn btn-danger">Clear Cart</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
