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
                    <p class="fw-700 price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <form action="{{ route('product.addToCart', $product->id) }}" method="POST">
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
                    </form>
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

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Product <span class="text-capitalize">{{ $product->name }}</span> has been added to your cart
                successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tampilkan modal jika ada session success
        @if(session('success'))
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        @endif

        const increaseButton = document.getElementById('increaseQuantity');
        const decreaseButton = document.getElementById('decreaseQuantity');
        const quantityInput = document.getElementById('quantityInput');

        if (increaseButton && decreaseButton && quantityInput) {
            // Tambahkan event listener untuk tombol "+"
            increaseButton.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);
                const maxValue = parseInt(quantityInput.getAttribute('max'));

                if (currentValue < maxValue) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Tambahkan event listener untuk tombol "-"
            decreaseButton.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);

                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        } else {
            console.error('Elemen increaseQuantity, decreaseQuantity, atau quantityInput tidak ditemukan di DOM.');
        }
    });
</script>