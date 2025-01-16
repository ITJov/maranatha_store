<!-- resources/views/roles/index-role.blade.php -->
@extends('layouts.master')

@section('title')
    Product Category
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Product Category
        @endslot
        @slot('title')
            Products Category
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

    <h1>Product Categories</h1>
    <div class="col-md-4">
        <div>
            <a href="{{ route('category.create') }}">
                <button type="button" class="btn btn-success waves-effect waves-light mb-3">
                    <i class="mdi mdi-plus me-1"></i> Add Category
                </button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                               style="border-collapse: collapse; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="mb-4">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="">{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('category.edit', $category->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="uil uil-pen"></i> Edit
                                        </a>
                                        <!-- Tombol Hide/Unhide -->
                                        @if ($category->hidden)
                                            <!-- Tombol Unhide -->
                                            <form action="{{ route('category.unhide', $category->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="uil uil-eye"></i> Unhide
                                                </button>
                                            </form>
                                        @else
                                            <!-- Tombol Hide -->
                                            <form action="{{ route('category.hide', $category->id) }}" method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                    <i class="uil uil-eye-slash"></i> Hide
                                                </button>
                                            </form>
                                        @endif

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
