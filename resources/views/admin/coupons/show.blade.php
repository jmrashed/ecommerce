@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Coupon Details</h2>
    <p><strong>Code:</strong> {{ $coupon->code }}</p>
    <p><strong>Type:</strong> {{ ucfirst($coupon->discount_type) }}</p>
    <p><strong>Amount:</strong> {{ $coupon->discount_amount }}</p>
    <p><strong>Expires At:</strong> {{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '-' }}</p>
    <p><strong>Active:</strong> {{ $coupon->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection