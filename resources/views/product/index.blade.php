@extends('user-dashboard.master-user')
@section('body-class', 'product-background background-img')

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row mt-4 mx-5 px-5">
                @foreach($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card round-circle rounded-4">
                            <a class="text-decoration-none text-dark"
                               href="{{ route('product.detail', ['id' => $product->id]) }}">
                                <img src="{{ asset($product->file_photo) }}"
                                     class="round-circle rounded-top-4 pt-4 card-img-top product-image"
                                     alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize">{{ $product->name }}</h5>
                                    <hr class="">
                                    <p class="card-text fw-bold m-0">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection