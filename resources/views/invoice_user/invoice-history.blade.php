@extends('user-dashboard.master-user')
@section('body-class', 'history-background background-img')
@section('title', 'History Receipt')

@section('content')
    <div class="container">
        <div class="my-4">
            <p class="history-title"><span class="color-primary">PURCHASE</span> HISTORY</p>
        </div>
        <div>
            <div class="row mb-1">
                <div class="col-1"></div>
                <div class="col-4">
                    <h4 class="fw-semibold">Purchase ID</h4>
                </div>
                <div class="col-3">
                    <h4 class="fw-semibold">Date</h4>
                </div>
                <div class="col-3">
                    <h4 class="fw-semibold text-center">Amount</h4>
                </div>
                <div class="col-1"></div>
            </div>
            @if($invoices == null)
                <hr>
                <div class="container d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 370.27px);">
                    <p>You don't have a transaction history yet</p>
                </div>
            @else
                @foreach( $invoices as $invoice)
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="card col-10 p-1">
                            <ul class="d-flex flex-row list-group list-group-flush">
                                <li class="list-group-item w-item ">{{ $invoice['id'] }}</li>
                                <li class="list-group-item w-item2" id="date">{{ $invoice['date']}}</li>
                                <li class="list-group-item w-item3 text-center">
                                    Rp {{ number_format($invoice['totalPrice'],0, '.',',') }} </li>
                            </ul>
                        </div>
                        <div class="col-1"></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection