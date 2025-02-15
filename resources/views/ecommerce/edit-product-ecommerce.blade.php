@extends('layouts.master')

@section('title')
Edit Product
@endsection

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" min="0" required>
    </div>

    <div class="mb-3">
        <label for="kuantiti" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="kuantiti" id="kuantiti" value="{{ $product->kuantiti }}" min="1" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-control select2" name="category" id="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label" for="file_photo">Product Image</label>
        <input id="file_photo" name="file_photo" type="file" class="form-control">
        @if($product->file_photo)
            <img src="{{ asset($product->file_photo) }}" alt="Product Image" class="mt-2" style="max-width: 200px;">
        @endif
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
