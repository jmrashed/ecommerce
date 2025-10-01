@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Brands</h2>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-3">Add Brand</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ route('admin.brands.show', $brand->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.brands.destroy', $brand->id) }}" style="display:inline;">
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