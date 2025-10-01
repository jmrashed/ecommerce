<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        $reviews = $product->reviews()->latest()->get();
        return view('reviews.index', compact('reviews', 'product'));
    }

    public function create(Product $product)
    {
        return view('reviews.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        $product->reviews()->create([
            'user_id' => Auth::id(),
            'rating'  => $request->rating,
            'comment' => $request->comment,
        ]);
        return redirect()->route('reviews.index', $product->id)->with('success', 'Review submitted.');
    }
}
