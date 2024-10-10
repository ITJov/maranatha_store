@extends('layouts.master')

@section('content')
<div class="site-blocks-cover" >
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                <div class="site-block-cover-content text-center">
                    <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                    <h1>Welcome To IHeath</h1>
                    <p>
                        <a href="{{ route('medicine-index') }}" class="btn btn-primary px-5 py-3">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">Popular Products</h2>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            @foreach($popularProducts as $product)
            <div class="col-3 text-center item mx-4 mb-5">
                <div class="card" style="width: 15rem; height: 25rem;">
                    <a href="/medicine-detail/{{ $product->med_id }}" class="text-decoration-none text-black">
                        <img src="{{$product->file_photo}}" class="card-img-top" alt="image"
                            style="width: 100%; height: 15rem; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h4 class="text-dark">
                            <a href="/medicine-detail/{{ $product->med_id }}"
                                class="text-black">{{$product->med_name}}</a>
                        </h4>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.')}}</p>
                        <p>Sold : {{ $product->total_quantity }} items</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('medicine-index') }}" class="btn btn-primary px-4 py-3">View All Products</a>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">New Products</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach($latestProducts as $product)
            <div class="col-3 text-center item mx-4 mb-5">
                <div class="card" style="width: 15rem; height: 23rem;">
                    <a href="/medicine-detail/{{ $product->med_id }}" class="text-decoration-none text-black">
                        <img src="{{$product->file_photo}}" class="card-img-top" alt="image"
                            style="width: 100%; height: 15rem; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h4 class="text-dark">
                            <a href="/medicine-detail/{{ $product->med_id }}"
                                class="text-black">{{$product->med_name}}</a>
                        </h4>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase">Testimonials</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3 products-wrap">
                <div class="nonloop-block-3 no-direction owl-carousel">

                    <div class="testimony">
                        <blockquote>
                            <img src="images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                            <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                voluptatem
                                consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet,
                                placeat
                                ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                        </blockquote>

                        <p>&mdash; Kelly Holmes</p>
                    </div>

                    <div class="testimony">
                        <blockquote>
                            <img src="images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                            <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                voluptatem
                                consectetur quam tempore
                                obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                ducimus.
                                Minus ratione sit quaerat
                                unde.&rdquo;</p>
                        </blockquote>

                        <p>&mdash; Rebecca Morando</p>
                    </div>

                    <div class="testimony">
                        <blockquote>
                            <img src="images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                            <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                voluptatem
                                consectetur quam tempore
                                obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                ducimus.
                                Minus ratione sit quaerat
                                unde.&rdquo;</p>
                        </blockquote>

                        <p>&mdash; Lucas Gallone</p>
                    </div>

                    <div class="testimony">
                        <blockquote>
                            <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                            <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                voluptatem
                                consectetur quam tempore
                                obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                ducimus.
                                Minus ratione sit quaerat
                                unde.&rdquo;</p>
                        </blockquote>

                        <p>&mdash; Andrew Neel</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-secondary bg-image">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" >
                    <div class="banner-1-inner align-self-center">
                        <h2>Pharma Products</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio
                            voluptatem.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex">
                    <div class="banner-1-inner ml-auto  align-self-center">
                        <h2>Rated by Experts</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio
                            voluptatem.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection