@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
    @slot('pagetitle') Ecommerce @endslot
    @slot('title') Add Product @endslot
@endcomponent

<div class="row">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    <div class="col-lg-12">
        <div id="addproduct-accordion" class="custom-accordion">
            <div class="p-4 border-top">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter your Product Name" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="kuantiti">Quantity</label>
                                <input id="kuantiti" name="kuantiti" type="number" class="form-control" placeholder="Enter your quantity of product" value="1" min="1" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input id="price" name="price" type="number" class="form-control" placeholder="Enter your Price" required value="0" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="kategori">Category</label>
                                <select class="form-control select2" name="kategori" id="kategori" required>
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                    <option value="new">Add New Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="new-category-container" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label" for="new-category">New Category</label>
                                <input id="new-category" name="new_category" type="text" class="form-control" placeholder="Enter new category">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter your Product Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="file_photo">Product Image</label>
                        <input id="file_photo" name="file_photo" type="file" class="form-control" required>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('product.create') }}" class="btn btn-danger"> <i class="uil uil-times me-1"></i> Cancel </a>
                        <button type="submit" class="btn btn-success"> <i class="uil uil-file-alt me-1"></i> Save </button>
                    </div>
                </form>
            </div>
               
           
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('script')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('kategori');
        const newCategoryContainer = document.getElementById('new-category-container');
        const newCategoryInput = document.getElementById('new-category');

        categorySelect.addEventListener('change', function () {
            if (this.value === 'new') {
                newCategoryContainer.style.display = 'block';
                newCategoryInput.required = true;
            } else {
                newCategoryContainer.style.display = 'none';
                newCategoryInput.required = false;
            }
        });
    });
</script>
@endsection
