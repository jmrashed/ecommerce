@extends('ecommerce::layouts.app')

@section('content')
<div class="container">
    <h1>Order Confirmation</h1>

    @if ($order)
        <div class="alert alert-success" role="alert">
            Thank you for your order! Your order number is <strong>{{ $order->order_number }}</strong>.
        </div>

        <h2>Order Details</h2>
        <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Billing Address:</strong> {{ $order->billing_address }}</p>
        <p><strong>Order Status:</strong> {{ ucfirst($order->order_status) }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>

        <h3>Items Ordered</h3>
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
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    @else
        <div class="alert alert-danger" role="alert">
            Order not found.
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
    @endif
</div>
@endsection