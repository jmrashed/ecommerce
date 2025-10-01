@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">{{ $stats['products'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">{{ $stats['orders'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text">{{ $stats['customers'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Revenue</h5>
                    <p class="card-text">${{ number_format($stats['revenue'], 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection