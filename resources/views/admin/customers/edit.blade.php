@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Customer</h2>
    <form method="POST" action="{{ route('admin.customers.update', $customer->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Customer</button>
    </form>
</div>
@endsection