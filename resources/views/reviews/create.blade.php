@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Write a Review</h2>
    <form method="POST" action="{{ route('reviews.store', $product->id) }}">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-select" required>
                <option value="">Select rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit Review</button>
    </form>
</div>
@endsection