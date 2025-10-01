@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Shipping Methods</h2>
    <a href="{{ route('admin.shippings.create') }}" class="btn btn-primary mb-3">Add Shipping Method</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cost</th>
                <th>Method</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shippings as $shipping)
                <tr>
                    <td>{{ $shipping->name }}</td>
                    <td>{{ $shipping->cost }}</td>
                    <td>{{ $shipping->method }}</td>
                    <td>{{ $shipping->active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('admin.shippings.show', $shipping->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.shippings.edit', $shipping->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.shippings.destroy', $shipping->id) }}" style="display:inline;">
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