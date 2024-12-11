@extends('user-dashboard.master-user')
@section('body-class', 'detail-product-background background-img')
@section('title', $product->name)

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row mb-5">
                <div class="col-2 d-flex justify-content-center">
                    <div>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary mb-3 detail-product-back">
                            <i class="bi bi-arrow-left"> Back</i>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{ asset($product->file_photo) }}" alt="{{ $product->name }}" class="img-fluid w-50">
                </div>
                <div class="col-5">
                    <p class="m-0 fs-5 text-capitalize">{{ $product->kategori }}</p>
                    <p class="detail-product-name text-capitalize">{{ $product->name }}</p>
                    <p class="fs-5">Stock: {{ $product->kuantiti }} <span
                                class="ms-3 fw-bold fs-5 fa-bold text-success">IN STOCK</span>
                    </p>
                    <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <!-- <form action="{{ route('product.addToCart', $product->id) }}" method="POST"> -->
                    @csrf
                    <div class="d-flex">
                        <div class="input-group mb-3" style="width: 150px;">
                            <button type="button" class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                            <input type="number" name="quantity" id="quantityInput" class="form-control text-center"
                                   value="1" min="1" max="{{ $product->kuantiti }}">
                            <button type="button" class="btn btn-outline-secondary" id="increaseQuantity">+</button>
                        </div>
                        <div class="ms-3">
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                    {{--                    </form>--}}
                </div>
            </div>
            <div class="mx-5 subtitle-text">
                <p>Recommendation <span class="color-primary"> Suitable </span> for You !</p>
                <hr class="dual-color-hr">
            </div>
            <div class="recommendation"></div>
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
