<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {$orders = Order::all();return view('admin.orders.index', compact('orders'));}
    public function show(Order $order)
    {return view('admin.orders.show', compact('order'));}
    public function edit(Order $order)
    {return view('admin.orders.edit', compact('order'));}
    public function update(Request $request, Order $order)
    { /* validation & update logic */}
    public function destroy(Order $order)
    {$order->delete();return redirect()->route('admin.orders.index');}
}
