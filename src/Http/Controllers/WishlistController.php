<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('customer_id', Auth::id())->with('product')->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function store(Request $request, $productId)
    {
        Wishlist::firstOrCreate([
            'customer_id' => Auth::id(),
            'product_id'  => $productId,
        ]);
        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function destroy($productId)
    {
        Wishlist::where('customer_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
