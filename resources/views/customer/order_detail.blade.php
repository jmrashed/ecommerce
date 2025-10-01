@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Order Details</h2>
    <p><strong>Order #:</strong> {{ $order->order_number }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->order_status) }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
    <h4>Items</h4>
    <ul>
        @foreach($order->orderItems as $item)
            <li>{{ $item->product->name }} x {{ $item->quantity }} (${{ number_format($item->price, 2) }})</li>
        @endforeach
    </ul>
</div>
@endsection