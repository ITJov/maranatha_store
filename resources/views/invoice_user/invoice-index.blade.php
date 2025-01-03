@extends('user-dashboard.master-user')

@section('title', 'Your Order is Being Prepared')

@section('content')
<div class="container mt-5">
    <div class="mb-3">
    <a href="{{ route('user.dashboard') }}" class="btn btn-success">Back to home</a>
    </div>

    <h1 class="text-center text-warning">Your Order is Being <span class="text-success">Prepared</span>!</h1>

    <div class="card mt-4">
    <div class="card-header bg-white text-center">
        <h4>Invoice Pembayaran</h4>
        <p>Payment ID: <strong>{{ $paymentId }}</strong></p>
        <p>Tanggal Pembelian: {{ $date }}</p>
        <p>{{ $storeData['store_name'] }}</p>
        <p>{{ $storeData['address'] }}</p>
        <p>Waktu: {{ $storeData['order_time'] }}</p>
    </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchasing as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th>Rp {{ number_format($totalPrice, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
<div class="mt-5 bg-dark text-white text-center p-4">
    <p>{{ $storeData['store_name'] }}</p>
    <p>&copy; 2024 {{ $storeData['store_name'] }} | <a href="https://instagram.com/maranathastore.official" class="text-warning" target="_blank">@maranathastore.official</a></p>
</div>
@endsection
