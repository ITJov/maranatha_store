<!-- resources/views/customers/index-customer.blade.php -->
@extends('layouts.master')

@section('title')
User List
@endsection

@section('content')
<h1>User List</h1>
<div class="col-md-4">
    <div>
        <a href="{{ route('customer-create') }}">
            <button type="button" class="btn btn-success waves-effect waves-light mb-3">
                <i class="mdi mdi-plus me-1"></i> Add Customer
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="mb-4">
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_id }}</td>
                                <td>
                                    <!-- Detail Button -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $user->id }}">
                                        <i class="uil uil-info-circle"></i> Detail
                                    </button>

                                    <!-- Edit Button -->
                                    <a href="{{ route('customer.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                        <i class="uil uil-pen"></i> Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('customer.destroy',$user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="uil uil-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for Customer Details -->
                            <div class="modal fade" id="detailModal{{ $user->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel{{ $user->id }}">Customer Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong> {{ $user->id }}</p>
                                            <p><strong>Name:</strong> {{ $user->name }}</p>
                                            <p><strong>Email:</strong> {{ $user->email }}</p>
                                            <p><strong>Role ID:</strong> {{ $user->role_id }}</p>
                                            <p><strong>Password:</strong> {{ $user->password }}</p> <!-- Note: Displaying passwords is not recommended -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                         
    </div>
</div>
@endsection
