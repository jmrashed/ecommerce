@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Coupons</h2>
    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary mb-3">Add Coupon</a>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Expires</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ ucfirst($coupon->discount_type) }}</td>
                    <td>{{ $coupon->discount_amount }}</td>
                    <td>{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '-' }}</td>
                    <td>{{ $coupon->active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.coupons.show', $coupon->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.coupons.destroy', $coupon->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection