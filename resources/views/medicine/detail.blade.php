@extends('layouts.master')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mr-auto">
                <div class="border text-center">
                    <img src="{{ $medicine->file_photo }}" alt="Image" class="img-fluid p-5">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{$medicine->med_name}}</h2>
                <p>{{ $medicine->description }}</p>
                <h4 class="text-black">Rp {{number_format($medicine->price, 0, ',', '.')}}</h4>
                <p class="mb-4">Stock : {{$medicine->med_quantity}}</p>

                <div class="mb-5">
                    <form action="{{ route('add-to-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="med_id" value="{{ $medicine->med_id }}">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="number" name="quantity" class="form-control text-center" value="1" min="1" max="{{ $medicine->med_quantity }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                        <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
                    </form>
                </div>
                <span><a href="/medicine" class="btn btn-sm height-auto px-4 py-3 btn-warning">Back</a></span>
            </div>
        </div>
    </div>
</div>
@endsection
