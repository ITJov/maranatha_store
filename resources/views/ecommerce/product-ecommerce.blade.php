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
    <div class="col-xl-12 col-lg-12">
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
                                            <th>No</th>
                                            <th>File Photo</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mb-4">
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                        <td>
                                            <img src="{{ asset($product->file_photo) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->kuantiti }}</td>
                                        <td>{{ $product->kategori }}</td>
                                        <td>
                                        <!-- Tombol Detail -->
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $product->id }}">
                                            <i class="uil uil-info-circle"></i> Detail
                                        </button>

                                        <!-- Tombol Edit -->
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                            <i class="uil uil-pen"></i> Edit
                                        </a>

                                        <!-- Tombol Hide/Unhide -->
                                        @if ($product->hidden)
                                            <!-- Tombol Unhide -->
                                            <form action="{{ route('product.unhide', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="uil uil-eye"></i> Unhide
                                                </button>
                                            </form>
                                        @else
                                            <!-- Tombol Hide -->
                                            <form action="{{ route('product.hide', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                    <i class="uil uil-eye-slash"></i> Hide
                                                </button>
                                            </form>
                                        @endif

                                            <form action="{{ route('product.addStock', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <div class="mt-3 input-group" style="width: 150px;">
                                                <input type="number" name="additional_stock" class="form-control" placeholder="Add Stock" min="1" required>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                            </form>
                                        </td>

                                    </tr>

                                    <!-- Modal untuk Detail Produk -->
                                    <div class="modal fade" id="detailModal{{ $product->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel{{ $product->id }}">Product Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Name:</strong> {{ $product->name }}</p>
                                                    <p><strong>Price:</strong> {{ $product->price }}</p>
                                                    <p><strong>Quantity:</strong> {{ $product->kuantiti }}</p>
                                                    <p><strong>Category:</strong> {{ $product->kategori }}</p>
                                                    <p><strong>Description:</strong> {{ $product->description }}</p>
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
                            <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>                         
    </div>
</div>
    <!-- End Main Content -->
</div>
@endsection
