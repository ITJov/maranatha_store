@extends('user-dashboard.master-user')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Welcome to Maranatha Store!</h1>
    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset($product->file_photo) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Price: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="card-text">Category: {{ $product->kategori }}</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
