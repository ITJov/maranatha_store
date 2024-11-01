@extends('layouts.master')
@section('title')
    @lang('translation.Invoice_Detail')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Invoices
        @endslot
        @slot('title')
            Invoice Detail
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Invoice 1 <span
                                class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                        <div class="mb-4">
                            <img src="{{ URL::asset('assets/images/Maranatha_Logo.png') }}" alt="logo" height="70" class="logo-dark" />
                            <img src="{{ URL::asset('assets/images/Maranatha_Logo.png') }}" alt="logo" height="70" class="logo-light" />
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                            <div>
                                <h5 class="font-size-16 mb-1">Invoice No:</h5>
                                <p>1</p>
                                <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                <p>09 Jul, 2020</p>
                                <h5 class="font-size-16 mb-1">Order No:</h5>
                                <p>#1123456</p>
                                <p class="mb-1">PrestonMiller@armyspy.com</p>
                            </div>
                        </div>
                    </div>


                    <div class="py-2">
                        <h5 class="font-size-15">Order summary</h5>

                        <div class="table-responsive">
                            <table class="table table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">01</th>
                                        <td>
                                            <h5 class="font-size-15 mb-1">Sepatu Nike N012 Running</h5>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">Color : <span class="fw-medium">Gray</span>
                                                </li>
                                                <li class="list-inline-item">Size : <span class="fw-medium">42</span></li>
                                            </ul>
                                        </td>
                                        <td>$260</td>
                                        <td>1</td>
                                        <td class="text-end">$260.00</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">02</th>
                                        <td>
                                            <h5 class="font-size-15 mb-1">Bola Basket</h5>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">Color : <span class="fw-medium">Black</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>$250</td>
                                        <td>1</td>
                                        <td class="text-end">$250.00</td>
                                    </tr>


                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end">$510.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Discount :</th>
                                        <td class="border-0 text-end">- $50.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Shipping Charge :</th>
                                        <td class="border-0 text-end">$25.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Tax</th>
                                        <td class="border-0 text-end">$13.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end">
                                            <h4 class="m-0">$498.00</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i
                                        class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
