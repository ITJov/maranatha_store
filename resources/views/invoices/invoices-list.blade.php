@extends('layouts.master')
@section('title')
    @lang('translation.Invoice_List')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Invoices
        @endslot
        @slot('title')
            Invoice List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-4">
            <div>
                <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i
                            class="mdi mdi-plus me-1"></i> Add Invoice
                </button>
            </div>
        </div>
        <div class="col-md-8">
            <div class="float-end">
                <div class=" mb-3">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                               style="border-collapse: collapse; width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 24px;">
                                    <div class="form-check text-center font-size-16">
                                        <input type="checkbox" class="form-check-input" id="invoicecheck">
                                        <label class="form-check-label" for="invoicecheck"></label>
                                    </div>
                                </th>
                                <th>Payment ID</th>
                                <th>User Name</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Download Pdf</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                            </thead>
                            <tbody class="mb-4">

                            <tr>
                                <td>
                                    <div class="form-check text-center font-size-16">
                                        <input type="checkbox" class="form-check-input" id="invoicecheck1">
                                        <label class="form-check-label" for="invoicecheck1"></label>
                                    </div>
                                </td>

                                <td><a href="javascript: void(0);" class="text-reset  fw-bold">1</a></td>
                                <td>
                                    10 Jul, 2020
                                </td>
                                <td>Connie Franco</td>

                                <td>
                                    $141
                                </td>
                                <td>
                                    <div class="badge bg-success-subtle text-success font-size-12">Paid</div>
                                </td>
                                <td>
                                    <div>
                                        <button class="btn btn-light btn-sm w-xs">Pdf <i
                                                    class="uil uil-download-alt ms-2"></i></button>
                                    </div>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="px-3 text-primary"><i
                                                class="uil uil-pen font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="px-3 text-danger"><i
                                                class="uil uil-trash-alt font-size-18"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-datatables.init.js') }}"></script>
@endsection
