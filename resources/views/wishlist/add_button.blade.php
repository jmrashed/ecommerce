@if(Auth::check())
    <form method="POST" action="{{ route('wishlist.add', $product->id) }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-primary btn-sm">Add to Wishlist</button>
    </form>
@endif