@extends('user-dashboard.master-user')
@section('body-class', 'payment-background background-img')
@section('title', 'Payment')

@section('content')
    <div class="payment-title mt-4 text-center">
        <p>Select <span class="color-primary">the bank</span> you would like to use for payment.</p>
    </div>
    <div class="container container-pay d-flex align-items-center mt-5">
        <div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <a class="text-decoration-none" href="/payments/pay">
                        <div class="card border-0 box-shadow rounded-4 p-2">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <img class="bank-logo" src="{{ asset('assets/images/bank/bca.png') }}" alt="bca">
                                <div class="text-start ms-5">
                                    <p class="bank-title mb-2 fw-500">Bank Central Asia</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <div class="card border-0 box-shadow rounded-4 p-2">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <img class="bank-logo" src="{{ asset('assets/images/bank/mandiri.png') }}" alt="mandiri">
                            <div class="text-start ms-5">
                                <p class="bank-title mb-2 fw-500">Bank Mandiri</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="card border-0 box-shadow rounded-4 p-2">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <img class="bank-logo" src="{{ asset('assets/images/bank/seabank.png') }}" alt="seabank">
                            <div class="text-start ms-5">
                                <p class="bank-title m-0 fw-500">Bank Seabank</p>
                                <p class="bank-title m-0 fw-500">Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card border-0 box-shadow rounded-4 p-2">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <img class="bank-logo" src="{{ asset('assets/images/bank/bri.png') }}" alt="bri">
                            <div class="text-start ms-5">
                                <p class="bank-title m-0 fw-500">Bank Rakyat</p>
                                <p class="bank-title m-0 fw-500">Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <img class="position-absolute payment-img" style="bottom: 69px; left: 20px"
                 src="{{ asset('assets/images/payment-1.png') }}" alt="">
            <img class="position-absolute payment-img" style="bottom: 63px; right: 20px"
                 src="{{ asset('assets/images/payment-2.png') }}" alt="">
        </div>
    </div>
@endsection