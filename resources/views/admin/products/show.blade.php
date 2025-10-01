@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Product Details</h2>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    <p><strong>Stock:</strong> {{ $product->quantity }}</p>
    <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
    <p><strong>Brand:</strong> {{ $product->brand->name ?? '-' }}</p>
    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection