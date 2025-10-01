@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Review Details</h2>
    <p><strong>Product:</strong> {{ $review->product->name ?? '-' }}</p>
    <p><strong>Customer:</strong> {{ $review->customer->name ?? '-' }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Comment:</strong> {{ $review->comment }}</p>
    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection