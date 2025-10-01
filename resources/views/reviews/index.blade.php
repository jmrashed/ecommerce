@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Product Reviews</h2>
    @if($reviews->count())
        <ul class="list-group mb-4">
            @foreach($reviews as $review)
                <li class="list-group-item">
                    <strong>{{ $review->user->name }}</strong> <span class="text-muted">rated {{ $review->rating }}/5</span>
                    <p>{{ $review->comment }}</p>
                    <small>{{ $review->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <p>No reviews yet.</p>
    @endif
    <a href="{{ route('reviews.create', $product->id) }}" class="btn btn-primary">Write a Review</a>
</div>
@endsection