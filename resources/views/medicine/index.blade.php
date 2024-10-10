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
                <h3 class="fw-semibold text-black">Medicine</h3>
            </div>
            <div class="mb-3">
                <a href="/medicine-create" class="btn btn-success d-flex">
                    <i class="bi bi-folder-plus"></i>
                    <span class="ps-2">Add New Medicine</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mx-5 px-5 mt-4 d-flex justify-content-center">
        @foreach($medicines as $medicine)
            <div class="col-3 text-center item mx-4 mb-5">
                <div class="card" style="width: 15rem; height: 25rem;">
                    <a href="/medicine-detail/{{ $medicine->med_id }}" class="text-decoration-none text-black">
                        <img src="{{$medicine->file_photo}}" class="card-img-top" alt="image"
                             style="width: 100%; height: 15rem; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h4 class="text-dark">
                            <a href="/medicine-detail/{{ $medicine->med_id }}"
                               class="text-black">{{$medicine->med_name}}</a>
                        </h4>
                        <p class="price">Rp {{ number_format($medicine->price, 0, ',', '.')}}</p>
                        <div>
                            <a href="/medicine-edit/{{ $medicine->med_id }}"
                               class="btn btn-warning text-light p-1" style="font-size: 12px;">
                                Edit
                            </a>
                            <button class="btn btn-danger p-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{$medicine->med_id}}"
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{$medicine->med_name}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="p-0 pb-1 m-0"> Apakah anda akan menghapus obat {{$medicine->med_name}}?</p>
                        <p class="fst-italic modal-keterangan">Data yang dihapus tidak bisa
                            dikembalikan </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel
                        </button>
                        <form method="post" action="{{ route('medicine-delete', ['medicine' => $medicine->med_id]) }}" class="d-inline" id="deleteForm">
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
