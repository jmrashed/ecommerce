@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form method="POST" action="{{ route('customer.profile.update') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
@endsection