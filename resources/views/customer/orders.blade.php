@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My Orders</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($order->order_status) }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td><a href="{{ route('customer.orders.detail', $order->id) }}" class="btn btn-sm btn-info">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection