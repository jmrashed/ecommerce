<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $code   = $request->input('code');
        $coupon = Coupon::where('code', $code)->first();
        if ($coupon && $coupon->isValid()) {
            Session::put('applied_coupon', $coupon->id);
            return redirect()->back()->with('success', 'Coupon applied successfully!');
        }
        return redirect()->back()->with('error', 'Invalid or expired coupon.');
    }

    public function remove()
    {
        Session::forget('applied_coupon');
        return redirect()->back()->with('success', 'Coupon removed.');
    }
}
