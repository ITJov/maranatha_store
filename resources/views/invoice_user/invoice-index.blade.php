@extends('user-dashboard.master-user')
@section('body-class', 'invoice-background background-img')
@section('title', 'Your Order is Being Prepared')

@section('content')
    <div class="container mt-5">
        <p class="text-center invoice-title">Your order is being <span class="color-primary fw-700">prepared</span>!
        </p>

        <div class="mb-5 d-flex justify-content-center">
            <a href="{{ route('user.dashboard') }}" class="btn background-secondary fw-bold px-5 py-2 text-light">BACK
                TO HOME</a>
        </div>

        <div class="card border-black mt-4">
            <div class="card-header border-black bg-white">
                <div class="row px-5 mt-5">
                    <div class="col-6">
                        <p class="fs-5 m-0">Kode Pembayaran</p>
                        <p class="fs-3 fw-bold">{{ $paymentId }}</p>
                    </div>
                    <div class="col-6 d-flex align-items-center invoice-data">
                        <div class="text-end me-3 col-10">
                            <p>Maranatha Store</p>
                            <p>Jalan Surya Sumantri no.65</p>
                            <p>Waktu : {{ $date }} - {{ $storeData['order_time'] }}</p>
                        </div>
                        <div class="col-2">
                            <img class="invoice-logo" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="row pb-2 pt-5">
                    <div class="col-12 text-center fs-3">
                        Kwintansi Pembayaran
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchasing as $item)
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
        <p>&copy; 2024 {{ $storeData['store_name'] }} | <a href="https://instagram.com/maranathastore.official"
                                                           class="text-warning"
                                                           target="_blank">@maranathastore.official</a></p>
    </div>
@endsection
