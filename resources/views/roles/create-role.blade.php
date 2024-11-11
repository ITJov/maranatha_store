<!-- resources/views/roles/create.blade.php -->
@extends('layouts.master')

@section('title')
Tambah Role
@endsection

@section('content')
<h1>Tambah Role Baru</h1>
<form action="{{ route('role.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="id" class="form-label">ID Role</label>
        <input type="text" class="form-control" name="id" id="id" required>
    </div>
    <div class="mb-3">
        <label for="nama_role" class="form-label">Nama Role</label>
        <input type="text" class="form-control" name="nama_role" id="nama_role" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection