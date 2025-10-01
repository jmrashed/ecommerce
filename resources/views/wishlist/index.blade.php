@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My Wishlist</h2>
    @if($wishlists->count())
        <ul class="list-group mb-4">
            @foreach($wishlists as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->name }}</a>
                    </div>
                    <form method="POST" action="{{ route('wishlist.remove', $item->product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Your wishlist is empty.</p>
    @endif
</div>
@endsection