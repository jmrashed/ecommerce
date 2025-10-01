@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Stock</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>
@endsection