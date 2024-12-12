@extends('user-dashboard.master-user')

@section('title', 'Your order is being prepared')

@section('content')
<div class="mb-3">
        <button class="btn btn-secondary" onclick="history.back()">
            <i class="bi bi-arrow-left"></i> Back to home
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

