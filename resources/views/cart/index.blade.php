@extends('ecommerce::layouts.app')

@section('content')
<div class="container">
    <h1>Your Shopping Cart</h1>

    @if ($cartItems->isEmpty())
        <p>Your cart is empty.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control w-25 d-inline">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <h3>Total: ${{ number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</h3>
            <a href="#" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @endif
</div>
@endsection