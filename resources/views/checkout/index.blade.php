@extends('ecommerce::layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    @if ($cartItems->isEmpty())
        <p>Your cart is empty. Please add some products before checking out.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    @else
        <div class="row">
            <div class="col-md-8">
                <h2>Order Summary</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total:</strong></td>
                            <td><strong>${{ number_format($totalAmount, 2) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>

                <h2>Shipping & Payment Information</h2>
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="shipping_address">Shipping Address</label>
                        <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address', Auth::check() && Auth::user()->addresses->first() ? Auth::user()->addresses->first()->full_address : '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="billing_address">Billing Address</label>
                        <textarea name="billing_address" id="billing_address" class="form-control" rows="3" required>{{ old('billing_address', Auth::check() && Auth::user()->addresses->first() ? Auth::user()->addresses->first()->full_address : '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="">Select Payment Method</option>
                            <option value="stripe">Stripe</option>
                            <option value="paypal">PayPal</option>
                            {{-- Add more payment methods as needed --}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
            <div class="col-md-4">
                {{-- Sidebar for additional information or ads --}}
            </div>
        </div>
    @endif
</div>
@endsection