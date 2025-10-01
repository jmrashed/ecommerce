@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My Reviews</h2>
    <ul class="list-group">
        @foreach($reviews as $review)
            <li class="list-group-item">
                <strong>{{ $review->product->name }}</strong> - Rated {{ $review->rating }}/5
                <p>{{ $review->comment }}</p>
                <small>{{ $review->created_at->diffForHumans() }}</small>
            </li>
        @endforeach
    </ul>
</div>
@endsection