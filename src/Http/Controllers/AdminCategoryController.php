<?php
namespace Ecommerce\Http\Controllers;

use Ecommerce\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {$categories = Category::all();return view('admin.categories.index', compact('categories'));}
    public function create()
    {return view('admin.categories.create');}
    public function store(Request $request)
    { /* validation & create logic */}
    public function show(Category $category)
    {return view('admin.categories.show', compact('category'));}
    public function edit(Category $category)
    {return view('admin.categories.edit', compact('category'));}
    public function update(Request $request, Category $category)
    { /* validation & update logic */}
    public function destroy(Category $category)
    {$category->delete();return redirect()->route('admin.categories.index');}
}
