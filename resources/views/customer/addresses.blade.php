@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My Addresses</h2>
    <ul class="list-group">
        @foreach($addresses as $address)
            <li class="list-group-item">{{ $address->full_address }}</li>
        @endforeach
    </ul>
</div>
@endsection