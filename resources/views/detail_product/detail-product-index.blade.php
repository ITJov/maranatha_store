@extends('user-dashboard.master-user')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="mt-5">
        <a href="javascript:history.back()" class="btn btn-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($product->file_photo) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>Category: {{ $product->kategori }}</p>
                <p>Stock: {{ $product->kuantiti }} <span class="text-success">IN STOCK</span></p>
                <p>Price: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <!-- <form action="{{ route('product.addToCart', $product->id) }}" method="POST"> -->
                    @csrf
                    <div class="input-group mb-3" style="width: 150px;">
                        <button type="button" class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                        <input type="number" name="quantity" id="quantityInput" class="form-control text-center" value="1" min="1" max="{{ $product->kuantiti }}">
                        <button type="button" class="btn btn-outline-secondary" id="increaseQuantity">+</button>
                    </div>
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('increaseQuantity').addEventListener('click', function () {
        const input = document.getElementById('quantityInput');
        let currentValue = parseInt(input.value);
        const maxValue = parseInt(input.getAttribute('max'));

        if (currentValue < maxValue) {
            input.value = currentValue + 1;
        }
    });

    document.getElementById('decreaseQuantity').addEventListener('click', function () {
        const input = document.getElementById('quantityInput');
        let currentValue = parseInt(input.value);

        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    });
</script>
@endpush
