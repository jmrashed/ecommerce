@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <!-- Search Form -->
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="mb-3">
                        <label for="search" class="form-label">{{ __('Search') }}</label>
                        <input type="text" class="form-control" id="search" name="search"
                            value="{{ request('search') }}">
                    </div>
                    <!-- Add more filters here -->
                    <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h1>{{ __('Products') }}</h1>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                    <!-- Add more actions (edit, delete) here -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">{{ __('No products found.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection