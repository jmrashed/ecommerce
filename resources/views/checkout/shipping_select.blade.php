<div class="form-group">
    <label for="shipping_method">Shipping Method</label>
    <select name="shipping_method" id="shipping_method" class="form-control" required>
        <option value="">Select Shipping Method</option>
        @foreach($shippingMethods as $method)
            <option value="{{ $method->id }}" data-cost="{{ $method->cost }}">
                {{ $method->name }} ({{ $method->method }}) - ${{ number_format($method->cost, 2) }}
            </option>
        @endforeach
    </select>
</div>