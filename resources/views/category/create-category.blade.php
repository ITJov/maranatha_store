<!-- resources/views/roles/create.blade.php -->
@extends('layouts.master')

@section('title')
Tambah Role
@endsection

@section('content')
<h1>Add New Category</h1>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_name" id="category_name" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="category_desc" class="form-label">Category Description</label>
        <input type="text" class="form-control" name="category_desc" id="category_desc" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
