@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Review</h2>
    <form method="POST" action="{{ route('admin.reviews.update', $review->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required>{{ $review->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Review</button>
    </form>
</div>
@endsection