@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Coupon</h2>
    <form method="POST" action="{{ route('admin.coupons.store') }}">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="discount_type" class="form-label">Type</label>
            <select name="discount_type" id="discount_type" class="form-select">
                <option value="fixed">Fixed</option>
                <option value="percent">Percent</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="discount_amount" class="form-label">Amount</label>
            <input type="number" name="discount_amount" id="discount_amount" class="form-control" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">Expires At</label>
            <input type="date" name="expires_at" id="expires_at" class="form-control">
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Coupon</button>
    </form>
</div>
@endsection