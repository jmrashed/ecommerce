<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Brand;
use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function index()
    {$brands = Brand::all();return view('admin.brands.index', compact('brands'));}
    public function create()
    {return view('admin.brands.create');}
    public function store(Request $request)
    { /* validation & create logic */}
    public function show(Brand $brand)
    {return view('admin.brands.show', compact('brand'));}
    public function edit(Brand $brand)
    {return view('admin.brands.edit', compact('brand'));}
    public function update(Request $request, Brand $brand)
    { /* validation & update logic */}
    public function destroy(Brand $brand)
    {$brand->delete();return redirect()->route('admin.brands.index');}
}
