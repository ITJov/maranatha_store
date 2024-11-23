@extends('layouts.master')

@section('title', 'Orders')

@section('content')
@component('common-components.breadcrumb')
    @slot('pagetitle') Ecommerce @endslot
    @slot('title') Orders @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->user->name ?? 'Guest' }}</td>
                                <td>${{ number_format($order->details->total_price, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->details->status_order == 'paid' ? 'success' : 'danger' }}">
                                        {{ ucfirst($order->details->status_order) }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetail{{ $order->id }}">
                                        View
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="orderDetail{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderDetailLabel{{ $order->id }}">Order Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                            <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                                            <p><strong>Date:</strong> {{ $order->date }}</p>
                                            <p><strong>Total:</strong> ${{ number_format($order->details->total_price, 2) }}</p>
                                            <p><strong>Status:</strong> {{ ucfirst($order->details->status_order) }}</p>
                                            <p><strong>Products:</strong></p>
                                            <ul>
                                                @foreach ($order->products as $product)
                                                <li>{{ $product->name }} - ${{ $product->price }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
