<!-- resources/views/customers/create.blade.php -->
@extends('layouts.master')

@section('title')
Tambah Customer Baru
@endsection

@section('content')
<h1>Add New Customer </h1>
<form action="{{ route('customer.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Customer Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>

    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select class="form-control" name="role_id" id="role_id" required>
            <option value="" disabled>Pilih Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
            @endforeach        
            </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
