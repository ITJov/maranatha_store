@extends('layouts.master')

@section('content')
<div class="mx-5 px-5">
    <div class="border-bottom ps-3 pt-3 d-flex justify-content-between">
        <div>
            <h3 class="fw-semibold text-black">Edit product</h3>
        </div>
        <div class="mb-3">
            <a href="/product" class="btn btn-warning gap-2">
                Back
            </a>
        </div>
    </div>
</div>
<div class="mx-5">
    <div class="card bg-light-subtle rouded-3 my-5 mx-5">
        <form method="post" action="{{  route('product-update', ['product' => $product->med_id])}}" class="p-4">
            @csrf
            <div class="mb-3 input-group">
                <div class="col-2">
                    <label for="med_id" class="form-label fw-semibold">ID</label>
                    <input type="text" class="form-control " id="med_id" name="med_id" readonly
                        value="{{ $product->med_id }}" placeholder="MEDXXX">
                </div>
                <div class="ps-4 col-7">
                    <label for="med_name" class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control" id="med_name" name="med_name" required autofocus
                        value="{{ $product->med_name }}" placeholder=" product Name">
                </div>
                <div class="ps-4 col-3">
                    <label for="price" class="form-label fw-semibold">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required
                        value="{{ $product->price }}" placeholder="Put the price here">
                </div>
            </div>
            <div class="ms-3 mb-4 me-3">
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea class="form-control" id="description" name="description" required rows="5"
                    placeholder="Description about the product">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3 input-group">
                <div class="col-2">
                    <label for="med_quantity" class="form-label fw-semibold">Quantityy</label>
                    <input type="text" class="form-control " id="med_quantity" name="med_quantity" required
                        value="{{ $product->med_quantity }}" placeholder="XXX">
                </div>
                <div class="ps-4 col-5">
                    <label for="exp_date" class="form-label fw-semibold">Expired Date</label>
                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ $product->exp_date }}" required>
                </div>
                <div class="ps-4 col-5">
                    <label for="file_photo" class="form-label fw-semibold">File Photo</label>
                    <input type="text" class="form-control" id="file_photo" name="file_photo" required
                        value="{{ $product->file_photo }}" placeholder="Put the link photo here">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="ms-3 mt-3 btn btn-success">Edit product</button>
            </div>
        </form>
    </div>
</div>
@endsection