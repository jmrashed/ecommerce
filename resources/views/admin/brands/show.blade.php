@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Brand Details</h2>
    <p><strong>Name:</strong> {{ $brand->name }}</p>
    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection