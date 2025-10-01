<?php
namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function dashboard()
    {
        // Example stats, replace with real queries
        $stats = [
            'products'  => \Ecommerce\Models\Product::count(),
            'orders'    => \Ecommerce\Models\Order::count(),
            'customers' => \Ecommerce\Models\Customer::count(),
            'revenue'   => \Ecommerce\Models\Order::sum('total_amount'),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
