@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Shipping Method Details</h2>
    <p><strong>Name:</strong> {{ $shipping->name }}</p>
    <p><strong>Cost:</strong> {{ $shipping->cost }}</p>
    <p><strong>Method:</strong> {{ $shipping->method }}</p>
    <p><strong>Active:</strong> {{ $shipping->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.shippings.edit', $shipping->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection