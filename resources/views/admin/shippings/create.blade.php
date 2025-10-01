@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Shipping Method</h2>
    <form method="POST" action="{{ route('admin.shippings.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" name="cost" id="cost" class="form-control" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="method" class="form-label">Method</label>
            <input type="text" name="method" id="method" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection