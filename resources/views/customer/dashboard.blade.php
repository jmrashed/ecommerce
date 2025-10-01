@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Welcome, {{ $customer->name }}</h2>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">{{ $orders->count() }} recent orders</p>
                    <a href="{{ route('customer.orders') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Wishlist</h5>
                    <p class="card-text">{{ $wishlistCount }} items</p>
                    <a href="{{ route('customer.wishlist') }}" class="btn btn-primary">View Wishlist</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reviews</h5>
                    <p class="card-text">{{ $reviewCount }} reviews</p>
                    <a href="{{ route('customer.reviews') }}" class="btn btn-primary">View Reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection