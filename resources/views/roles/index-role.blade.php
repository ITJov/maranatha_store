<!-- resources/views/roles/index-role.blade.php -->
@extends('layouts.master')

@section('title')
Role List
@endsection

@section('content')
@component('common-components.breadcrumb')
        @slot('pagetitle')
            User
        @endslot
        @slot('title')
            Roles User
        @endslot
    @endcomponent
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

<h1>Role List</h1>
<div class="col-md-4">
    <div>
        <a href="{{ route('role.create') }}">
            <button type="button" class="btn btn-success waves-effect waves-light mb-3">
                <i class="mdi mdi-plus me-1"></i> Add Role
            </button>
        </a>
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
                                <th style="width: 24px;">
                                    <div class="form-check text-center font-size-16">
                                        <input type="checkbox" class="form-check-input" id="rolecheck">
                                        <label class="form-check-label" for="rolecheck"></label>
                                    </div>
                                </th>
                                <th>Nama Role</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody class="mb-4">
                            @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <div class="form-check text-center font-size-16">
                                        <input type="checkbox" class="form-check-input" id="rolecheck{{ $role->id }}">
                                        <label class="form-check-label" for="rolecheck{{ $role->id }}"></label>
                                    </div>
                                </td>
                                <td>{{ $role->nama_role }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-sm">
                                        <i class="uil uil-pen"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus role ini?');">
                                            <i class="uil uil-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                         
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tunggu sampai halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {
        // Pilih semua tombol dengan class .delete-btn
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const roleId = this.getAttribute('data-id'); // Ambil ID dari atribut data-id

                // Tampilkan SweetAlert
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form dengan ID yang sesuai
                        document.getElementById('delete-form-' + roleId).submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    });
</script>
@endsection
