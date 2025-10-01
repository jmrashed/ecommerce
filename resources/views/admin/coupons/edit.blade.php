@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Coupon</h2>
    <form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $coupon->code }}" required>
        </div>
        <div class="mb-3">
            <label for="discount_type" class="form-label">Type</label>
            <select name="discount_type" id="discount_type" class="form-select">
                <option value="fixed" @if($coupon->discount_type == 'fixed') selected @endif>Fixed</option>
                <option value="percent" @if($coupon->discount_type == 'percent') selected @endif>Percent</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="discount_amount" class="form-label">Amount</label>
            <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{ $coupon->discount_amount }}" required step="0.01">
        </div>
        <div class="mb-3">
            <label for="expires_at" class="form-label">Expires At</label>
            <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '' }}">
        </div>
        <div class="mb-3">
            <label for="active" class="form-label">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1" @if($coupon->active) selected @endif>Yes</option>
                <option value="0" @if(!$coupon->active) selected @endif>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Coupon</button>
    </form>
</div>
@endsection