<!-- resources/views/roles/edit-role.blade.php -->
@extends('layouts.master')

@section('title')
Edit Category
@endsection

@section('content')
<h1>Edit Role</h1>

<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category->name }}" required>
    </div>

    <div class="mb-3">
        <label for="category_desc" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_desc" id="category_desc" value="{{ $category->description }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
