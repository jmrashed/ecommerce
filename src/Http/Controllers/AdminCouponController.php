<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Coupon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function index()
    {$coupons = Coupon::all();return view('admin.coupons.index', compact('coupons'));}
    public function create()
    {return view('admin.coupons.create');}
    public function store(Request $request)
    { /* validation & create logic */}
    public function show(Coupon $coupon)
    {return view('admin.coupons.show', compact('coupon'));}
    public function edit(Coupon $coupon)
    {return view('admin.coupons.edit', compact('coupon'));}
    public function update(Request $request, Coupon $coupon)
    { /* validation & update logic */}
    public function destroy(Coupon $coupon)
    {$coupon->delete();return redirect()->route('admin.coupons.index');}
}
