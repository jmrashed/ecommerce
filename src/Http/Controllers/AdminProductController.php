<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {$products = Product::all();return view('admin.products.index', compact('products'));}
    public function create()
    {return view('admin.products.create');}
    public function store(Request $request)
    { /* validation & create logic */}
    public function show(Product $product)
    {return view('admin.products.show', compact('product'));}
    public function edit(Product $product)
    {return view('admin.products.edit', compact('product'));}
    public function update(Request $request, Product $product)
    { /* validation & update logic */}
    public function destroy(Product $product)
    {$product->delete();return redirect()->route('admin.products.index');}
}
