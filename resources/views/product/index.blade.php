@extends('layouts.master')

@section('content')
<!-- Flash Messages -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif
    <div class="mx-5 px-5">
        <div class="border-bottom ps-3 pt-3 d-flex justify-content-between">
            <div>
                <h3 class="fw-semibold text-black">Product</h3>
            </div>
            <div class="mb-3">
                <a href="/product-create" class="btn btn-success d-flex">
                    <i class="bi bi-folder-plus"></i>
                    <span class="ps-2">Add New Product</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mx-5 px-5 mt-4 d-flex justify-content-center">
        @foreach($products as $product)
            <div class="col-3 text-center item mx-4 mb-5">
                <div class="card" style="width: 15rem; height: 25rem;">
                    <a href="/product-detail/{{ $product->med_id }}" class="text-decoration-none text-black">
                        <img src="{{$product->file_photo}}" class="card-img-top" alt="image"
                             style="width: 100%; height: 15rem; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h4 class="text-dark">
                            <a href="/product-detail/{{ $product->med_id }}"
                               class="text-black"></a>
                        </h4>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.')}}</p>
                        <div>
                            <a href="/product-edit/{{ $product->med_id }}"
                               class="btn btn-warning text-light p-1" style="font-size: 12px;">
                                Edit
                            </a>
                            <button class="btn btn-danger p-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{$product->med_id}}"
                                    style="font-size: 12px;">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="p-0 pb-1 m-0"> Apakah anda akan menghapus obat ?</p>
                        <p class="fst-italic modal-keterangan">Data yang dihapus tidak bisa
                            dikembalikan </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel
                        </button>
                        <form method="post" action="" class="d-inline" id="deleteForm">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>
@endsection
