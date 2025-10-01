@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->main_image_url ?? asset('images/default-product.png') }}" class="img-fluid mb-3" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h4 class="text-success">${{ number_format($product->price, 2) }}</h4>
            @include('wishlist.add_button', ['product' => $product])
            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-3">
                @csrf
                <div class="input-group mb-2">
                    <input type="number" name="quantity" value="1" min="1" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <h3>Reviews</h3>
    @include('reviews.index', ['reviews' => $product->reviews, 'product' => $product])
    <a href="{{ route('reviews.create', $product->id) }}" class="btn btn-outline-secondary mt-2">Write a Review</a>
</div>
@endsection