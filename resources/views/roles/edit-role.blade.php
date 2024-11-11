<!-- resources/views/roles/edit-role.blade.php -->
@extends('layouts.master')

@section('title')
Edit Role
@endsection

@section('content')
<h1>Edit Role</h1>

<form action="{{ route('role.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Method PUT untuk update data -->

    <div class="mb-3">
        <label for="id" class="form-label">ID Role</label>
        <input type="text" class="form-control" name="id" id="id" value="{{ $role->id }}" readonly>
    </div>

    <div class="mb-3">
        <label for="nama_role" class="form-label">Nama Role</label>
        <input type="text" class="form-control" name="nama_role" id="nama_role" value="{{ $role->nama_role }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
