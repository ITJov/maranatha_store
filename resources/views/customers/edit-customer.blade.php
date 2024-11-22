@extends('layouts.master')

@section('title')
Edit Customer
@endsection

@section('content')
<h1>Edit Customer</h1>

<form action="{{ route('customer.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Method PUT untuk update data -->

    <div class="mb-3">
        <label for="id" class="form-label">ID Customer</label>
        <input type="text" class="form-control" name="id" id="id" value="{{ $users->id }}" readonly>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama Customer</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $users->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $users->email }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Isi jika ingin mengubah password">
    </div>

    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select class="form-control" name="role_id" id="role_id" required>
            <option value="" disabled>Pilih Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->id }} - {{ $role->nama_role }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
