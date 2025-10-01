<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        return view('admin.shipping.index', compact('shippings'));
    }

    public function create()
    {
        return view('admin.shipping.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'cost'   => 'required|numeric',
            'method' => 'required',
        ]);
        Shipping::create($request->all());
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method added.');
    }

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        return view('admin.shipping.edit', compact('shipping'));
    }

    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method updated.');
    }

    public function destroy($id)
    {
        Shipping::destroy($id);
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method deleted.');
    }
}
