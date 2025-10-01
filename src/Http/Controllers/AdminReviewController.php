<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {$reviews = Review::all();return view('admin.reviews.index', compact('reviews'));}
    public function show(Review $review)
    {return view('admin.reviews.show', compact('review'));}
    public function edit(Review $review)
    {return view('admin.reviews.edit', compact('review'));}
    public function update(Request $request, Review $review)
    { /* validation & update logic */}
    public function destroy(Review $review)
    {$review->delete();return redirect()->route('admin.reviews.index');}
}
