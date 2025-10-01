@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Order</h2>
    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="order_status" class="form-label">Status</label>
            <select name="order_status" id="order_status" class="form-select">
                <option value="pending" @if($order->order_status == 'pending') selected @endif>Pending</option>
                <option value="processing" @if($order->order_status == 'processing') selected @endif>Processing</option>
                <option value="completed" @if($order->order_status == 'completed') selected @endif>Completed</option>
                <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Order</button>
    </form>
</div>
@endsection