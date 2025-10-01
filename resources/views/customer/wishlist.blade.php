@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My Wishlist</h2>
    <ul class="list-group">
        @foreach($wishlists as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection