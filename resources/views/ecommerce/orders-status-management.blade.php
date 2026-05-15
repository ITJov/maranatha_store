@extends('layouts.master') {{-- Sesuaikan dengan nama layout admin kamu --}}

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="fw-bold mb-4">Manajemen Antrean Pesanan (Live)</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Bayar</th>
                            <th>Pelanggan</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><strong>{{ $order->payment_id }}</strong></td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->product_name }} (x{{ $order->kuantiti_produk }})</td>
                            <td>
                                @if($order->status_order == 1) <span class="badge bg-info">Menunggu</span>
                                @elseif($order->status_order == 2) <span class="badge bg-warning text-dark">Disiapkan</span>
                                @elseif($order->status_order == 3) <span class="badge bg-success">Siap Diambil</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('orders.updateStatus', $order->detail_id) }}" method="POST">
                                    @csrf @method('PUT')
                                    @if($order->status_order == 1)
                                        <button name="status" value="2" class="btn btn-warning btn-sm">Mulai Siapkan</button>
                                    @elseif($order->status_order == 2)
                                        <button name="status" value="3" class="btn btn-success btn-sm">Set Siap Diambil</button>
                                    @elseif($order->status_order == 3)
                                        <button name="status" value="4" class="btn btn-secondary btn-sm">Selesaikan</button>
                                    @endif
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
@endsection