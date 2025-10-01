@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Category Details</h2>
    <p><strong>Name:</strong> {{ $category->name }}</p>
    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection