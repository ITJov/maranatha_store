@extends('user-dashboard.master-user')

@section('title', 'Your Cart')

@section('content')
<div class="container">
    <!-- Tombol Back -->
    <div class="mb-3">
        <button class="btn btn-secondary" onclick="history.back()">
            <i class="bi bi-arrow-left"></i> Back
        </button>
    </div>

    <!-- Konten Cart -->
    <h1 class="text-center mt-5">Your Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>
                    <div class="quantity-wrapper d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary btn-decrease" data-id="{{ $loop->index }}">-</button>
                        <input type="number" class="form-control quantity-input mx-2" data-id="{{ $loop->index }}" value="{{ $item['quantity'] }}" min="1">
                        <button class="btn btn-sm btn-outline-secondary btn-increase" data-id="{{ $loop->index }}">+</button>
                    </div>
                </td>
                <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                <td>
                    <button class="btn btn-danger btn-sm">Remove</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <h4>Total: Rp {{ number_format($cartItems->sum(fn($item) => $item['price'] * $item['quantity']), 0, ',', '.') }}</h4>
        <button class="btn btn-success">Check Out</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).on('click', '.btn-increase, .btn-decrease', function() {
        let button = $(this);
        let input = button.closest('.quantity-wrapper').find('.quantity-input');
        let currentQuantity = parseInt(input.val());
        let newQuantity = button.hasClass('btn-increase') ? currentQuantity + 1 : currentQuantity - 1;

        if (newQuantity < 1) return; 

        $.ajax({
            url: `/carts/${input.data('id')}/update-quantity`,
            method: 'POST',
            data: {
                quantity: newQuantity,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    input.val(newQuantity); 
                    location.reload(); 
                }
            }
        });
    });
</script>
@endpush
