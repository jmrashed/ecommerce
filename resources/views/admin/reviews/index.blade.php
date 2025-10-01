@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Reviews</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Customer</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->product->name ?? '-' }}</td>
                    <td>{{ $review->customer->name ?? '-' }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection