@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Brand</h2>
    <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Brand</button>
    </form>
</div>
@endsection