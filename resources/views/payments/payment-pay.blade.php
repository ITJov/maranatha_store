@extends('user-dashboard.master-user')
@section('body-class', 'payment-background background-img')
@section('title', 'Payment')

@section('content')
    <div class="payment-title mt-4 mb-5 text-center">
        <p>Copy this <span class="color-primary">virtual account</span> to make Payments</p>
    </div>
    <div class="container container-pay d-flex align-items-center">
        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card border-0 box-shadow rounded-4 p-2">
                    <div class="card-body d-flex align-items-center">
                        <img class="bank-logo-pay w-20 ps-3" src="{{ asset('assets/images/bank/'.$bank.'.png') }}"
                             alt={{$bank}}>
                        <div class="text-start ms-5">
                            @if($bank == 'bca' || $bank == 'bri')
                                <p class="bank-title mb-2 fw-5 fw-bold">{{strtoupper($bank)}} Virtual Account</p>
                            @else
                                <p class="bank-title mb-2 fw-5 fw-bold">{{ucwords($bank)}} Virtual Account</p>
                            @endif
                            <p class="m-0" id="virtualAccount">No : {{$vaNumber}}</p>
                        </div>
                        <form class="ms-auto me-2" id="copyForm" action="{{ route('invoice.index') }}" method="POST">
                            @csrf
                            <button id="copyButton" class="btn btn-copy">
                                <img src="{{ asset('assets/images/copy.png') }}" alt="">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
        <img class="position-absolute payment-img" style="bottom: 69px; left: 20px"
             src="{{ asset('assets/images/payment-1.png') }}" alt="">
        <img class="position-absolute payment-img" style="bottom: 63px; right: 20px"
             src="{{ asset('assets/images/payment-2.png') }}" alt="">
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('copyForm').addEventListener('submit', function (event) {
            // Prevent form submission to handle clipboard first
            event.preventDefault();
            const virtualAccount = document.getElementById('virtualAccount').innerText;

            // Copy to clipboard
            navigator.clipboard.writeText(virtualAccount).then(() => {
                alert('Virtual account number copied to clipboard!');

                // Redirect to the invoice page
                window.location.href = "{{ route('invoice.index') }}";
            }).catch(err => {
                alert('Failed to copy virtual account number.');
            });
        });
    </script>
@endpush
