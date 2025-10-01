<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {$customers = Customer::all();return view('admin.customers.index', compact('customers'));}
    public function show(Customer $customer)
    {return view('admin.customers.show', compact('customer'));}
    public function edit(Customer $customer)
    {return view('admin.customers.edit', compact('customer'));}
    public function update(Request $request, Customer $customer)
    { /* validation & update logic */}
    public function destroy(Customer $customer)
    {$customer->delete();return redirect()->route('admin.customers.index');}
}
