@extends('layouts.master')

@section('title')
    Maranatha Store
@endsection

@section('content')
@component('common-components.breadcrumb')
    @slot('pagetitle') Ecommerce @endslot
    @slot('title') Products @endslot
@endcomponent

<div class="row">
    <!-- Main Content -->
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="search-box">
                        <div class="position-relative">
                            <input type="text" class="form-control bg-light border-light rounded" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th>File Photo</th>                   
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody class="mb-4">
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset($product->file_photo) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->kuantiti }}</td>
                                <td>{{ $product->kategori }}</td>
                                <td>
                                    <!-- Detail Button -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $product->id }}">
                                        <i class="uil uil-info-circle"></i> Detail
                                    </button>

                                    <!-- Edit Button -->
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                        <i class="uil uil-pen"></i> Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('product.destroy',$product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Are you sure you want to delete this product$product?');">
                                            <i class="uil uil-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for Customer Details -->
                            <div class="modal fade" id="detailModal{{ $product->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $product->id }}">Customer Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Name:</strong> {{ $product->name }}</p>
                                            <p><strong>Description:</strong> {{ $product->description }}</p>
                                            <p><strong>Price:</strong> {{ $product->price }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                         
    </div>
</div>
    <!-- End Main Content -->
</div>
@endsection