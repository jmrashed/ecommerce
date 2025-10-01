@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Category</h2>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>
@endsection