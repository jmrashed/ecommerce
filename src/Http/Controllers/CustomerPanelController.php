<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Order;
use Ecommerce\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPanelController extends Controller
{
    public function dashboard()
    {
        $customer      = Auth::user();
        $orders        = $customer->orders()->latest()->take(5)->get();
        $wishlistCount = $customer->wishlists()->count();
        $reviewCount   = $customer->reviews()->count();
        return view('customer.dashboard', compact('customer', 'orders', 'wishlistCount', 'reviewCount'));
    }

    public function orders()
    {
        $orders = Auth::user()->orders()->latest()->get();
        return view('customer.orders', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        $this->authorize('view', $order);
        return view('customer.order_detail', compact('order'));
    }

    public function addresses()
    {
        $addresses = Auth::user()->addresses;
        return view('customer.addresses', compact('addresses'));
    }

    public function reviews()
    {
        $reviews = Auth::user()->reviews()->latest()->get();
        return view('customer.reviews', compact('reviews'));
    }

    public function wishlist()
    {
        $wishlists = Auth::user()->wishlists()->with('product')->get();
        return view('customer.wishlist', compact('wishlists'));
    }

    public function editProfile()
    {
        $customer = Auth::user();
        return view('customer.profile_edit', compact('customer'));
    }

    public function updateProfile(Request $request)
    {
        $customer = Auth::user();
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Add more validation as needed
        ]);
        $customer->update($request->only(['name', 'email']));
        return redirect()->route('customer.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
