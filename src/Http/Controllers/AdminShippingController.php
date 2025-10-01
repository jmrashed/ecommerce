<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Shipping;
use Illuminate\Http\Request;

class AdminShippingController extends Controller
{
    public function index()
    {$shippings = Shipping::all();return view('admin.shippings.index', compact('shippings'));}
    public function create()
    {return view('admin.shippings.create');}
    public function store(Request $request)
    { /* validation & create logic */}
    public function show(Shipping $shipping)
    {return view('admin.shippings.show', compact('shipping'));}
    public function edit(Shipping $shipping)
    {return view('admin.shippings.edit', compact('shipping'));}
    public function update(Request $request, Shipping $shipping)
    { /* validation & update logic */}
    public function destroy(Shipping $shipping)
    {$shipping->delete();return redirect()->route('admin.shippings.index');}
}
