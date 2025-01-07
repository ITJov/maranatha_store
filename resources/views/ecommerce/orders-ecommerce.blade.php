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
                                <th>Name</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status Pickup</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->product->name ?? 'Produk tidak ditemukan' }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->kuantiti_produk }}</td>
                                <td>{{ $order->details->total_price ?? 'Tidak tersedia' }}</td>
                                <td>{{ $order->details->status_order ?? 'Belum diproses' }}</td>
                            </tr>
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
