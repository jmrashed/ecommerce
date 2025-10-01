@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Shipping Method</h2>
    <form method="POST" action="{{ route('admin.shippings.update', $shipping->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $shipping->name }}" required>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" name="cost" id="cost" class="form-control" value="{{ $shipping->cost }}" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="method" class="form-label">Method</label>
            <input type="text" name="method" id="method" class="form-control" value="{{ $shipping->method }}" required>
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1" @if($shipping->active) selected @endif>Yes</option>
                <option value="0" @if(!$shipping->active) selected @endif>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection