@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Category</h2>
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
@endsection