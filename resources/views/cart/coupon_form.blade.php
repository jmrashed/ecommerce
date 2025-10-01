@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="{{ route('coupon.apply') }}" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="text" name="code" class="form-control" placeholder="Enter coupon code" required>
        <button type="submit" class="btn btn-primary">Apply Coupon</button>
    </div>
</form>
@if(session('applied_coupon'))
    <form method="POST" action="{{ route('coupon.remove') }}">
        @csrf
        <button type="submit" class="btn btn-warning">Remove Coupon</button>
    </form>
@endif