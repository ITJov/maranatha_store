@extends('user-dashboard.master-user')
@section('body-class', 'home-page-background background-img')
@section('content')
        <div id="carouselExampleAutoplaying" class="carousel slide m-5 px-5" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3" id="carousel">
                <div class="carousel-item active">
                    <img class="carousel-image"
                         src="https://img.freepik.com/free-vector/hand-drawn-grocery-store-sale-banner_23-2151042248.jpg?t=st=1732711167~exp=1732714767~hmac=2750b241448bef1b380d98bfa06e16fc14a7ec73a49167e39ef4c208fbbfda82&w=1060"
                         class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img class="carousel-image"
                         src="https://img.freepik.com/free-vector/hand-drawn-supermarket-facebook-cover-template_23-2149406382.jpg?t=st=1732711321~exp=1732714921~hmac=b43f0e3ce0591b3877f2d91c3a3d327590ecc646b773b282f322d34faa3e9d6e&w=1060"
                         class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img class="carousel-image"
                         src="https://img.freepik.com/free-vector/flat-design-supermarket-facebook-cover-template_23-2150330746.jpg?t=st=1732711360~exp=1732714960~hmac=60448ff92a148a73fdd652dba21a271edd4e536e5422483498f29841f3f57187&w=1060"
                         class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="mx-5 px-5 subtitle-text">
            <p>We've got a big <span class="color-primary"> discount </span> for you !</p>
            <hr class="dual-color-hr">
        </div>
        <div class="my-4 d-flex align-item-center justify-content-center banner text-light text-center">
            <div class="row align-items-center me-5">
                <div class="col-12 fw-500 open-hours">
                    OPEN HOURS
                </div>
            </div>
            <div class="row align-items-center ms-5">
                <div class="col-12 fw-500 schedule">
                    <p> SENIN - JUMAT </p>
                    <p class="m-0">08.00 - 17.00 </p>
                </div>
            </div>
        </div>
        <div class="mx-5 px-5 subtitle-text">
            <p class="color-secondary">NEW ARRIVALS</p>
            <hr class="dual-color-hr">
        </div>
        <div class="row mt-4 mx-5 px-5">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card round-circle rounded-4">
                        <a class="text-decoration-none text-dark" href="{{ route('product.detail', ['id' => $product->id]) }}">
                            <img src="{{ asset($product->file_photo) }}"
                                 class="round-circle rounded-top-4 pt-4 card-img-top product-image"
                                 alt="{{ $product->name }}">

                            <div class="card-body">
                                <h5 class="card-title text-capitalize">{{ $product->name }}</h5>
                                <p class="card-text fw-bold m-0">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <hr class="my-3">
                                <p class="card-text">Category: {{ $product->kategori }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
@endsection
