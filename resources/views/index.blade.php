@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Maranatha Store @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">$<span data-plugin="counterup">34,152</span></h4>
                    <p class="text-muted mb-0">Total Revenue</p>
                </div>
                <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span>  last week
                </p> -->
            </div>
        </div>
    </div> 

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">$<span data-plugin="counterup">34,152</span></h4>
                    <p class="text-muted mb-0">Total Revenue</p>
                </div>
                <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span>  last week
                </p> -->
            </div>
        </div>
    </div> 
</div>

<div class="card">
        <div class="card-body">
            <div class="float-end">
                <div class="dropdown">
                    <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="#">Monthly</a>
                        <a class="dropdown-item" href="#">Yearly</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                    </div>
                </div>
            </div>

            <h4 class="card-title mb-4">Top Selling Products</h4>


            <div class="row align-items-center g-0 mt-3">
                <div class="col-sm-3">
                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Roti </p>
                </div>

                <div class="col-sm-9">
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar progress-bar bg-primary" role="progressbar"
                            style="width: 52%" aria-valuenow="52" aria-valuemin="0"
                            aria-valuemax="52">
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="row align-items-center g-0 mt-3">
                <div class="col-sm-3">
                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-info me-2"></i> Es Krim </p>
                </div>
                <div class="col-sm-9">
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar progress-bar bg-info" role="progressbar"
                            style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                            aria-valuemax="45">
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="row align-items-center g-0 mt-3">
                <div class="col-sm-3">
                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-success me-2"></i> Indomie </p>
                </div>
                <div class="col-sm-9">
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar progress-bar bg-success" role="progressbar"
                            style="width: 48%" aria-valuenow="48" aria-valuemin="0"
                            aria-valuemax="48">
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="row align-items-center g-0 mt-3">
                <div class="col-sm-3">
                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-warning me-2"></i> Susu </p>
                </div>
                <div class="col-sm-9">
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar progress-bar bg-warning" role="progressbar"
                            style="width: 78%" aria-valuenow="78" aria-valuemin="0"
                            aria-valuemax="78">
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="row align-items-center g-0 mt-3">
                <div class="col-sm-3">
                    <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-purple me-2"></i> Brownies </p>
                </div>
                <div class="col-sm-9">
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar progress-bar bg-purple" role="progressbar"
                            style="width: 63%" aria-valuenow="63" aria-valuemin="0"
                            aria-valuemax="63">
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end Col -->

 
    <!-- <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">5,643</span></h4>
                    <p class="text-muted mb-0">Orders</p>
                </div>
                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                </p>
            </div>
        </div>
    </div> end col -->

    <!-- <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">45,254</span></h4>
                    <p class="text-muted mb-0">Customers</p>
                </div>
                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                </p>
            </div>
        </div>
    </div> end col -->
<!-- 
    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">12.58</span>%</h4>
                    <p class="text-muted mb-0">Growth</p>
                </div>
                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                </p>
            </div>
        </div>
    </div> end col -->
<!-- </div> end row -->

<div class="card">
    <div class="card-body">
        <div class="float-end">
            <div class="dropdown">
                <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                    <a class="dropdown-item" href="#">Monthly</a>
                    <a class="dropdown-item" href="#">Yearly</a>
                    <a class="dropdown-item" href="#">Weekly</a>
                </div>
            </div>
        </div>
        <h4 class="card-title mb-4">Sales Analytics</h4>

        <div class="mt-1">
            <ul class="list-inline main-chart mb-0">
                <li class="list-inline-item chart-border-left me-0 border-0">
                    <h3 class="text-primary">$<span data-plugin="counterup">2,371</span><span class="text-muted d-inline-block font-size-15 ms-3">Income</span></h3>
                </li>
                <li class="list-inline-item chart-border-left me-0">
                    <h3><span data-plugin="counterup">258</span><span class="text-muted d-inline-block font-size-15 ms-3">Sales</span>
                    </h3>
                </li>
                <li class="list-inline-item chart-border-left me-0">
                    <h3><span data-plugin="counterup">3.6</span>%<span class="text-muted d-inline-block font-size-15 ms-3">Conversation Ratio</span></h3>
                </li>
            </ul>
        </div>

        <div class="mt-3">
            <div id="sales-analytics-chart" data-colors='["--bs-primary", "#dfe2e6", "--bs-warning"]' class="apex-charts" dir="ltr"></div>
        </div>
    </div> <!-- end card-body-->
</div> <!-- end card-->


<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Transaction</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">1</a> </td>
                                <td>Neal Matthews</td>
                                <td>
                                    07 Oct, 2019
                                </td>
                                <td>
                                    $400
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-success-subtle text-success font-size-12">Paid</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-mastercard me-1"></i> BCA
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                        <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">2</a> </td>
                                <td>Jamal Burnett</td>
                                <td>
                                    07 Oct, 2019
                                </td>
                                <td>
                                    $380
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-danger-subtle text-danger font-size-12">Chargeback</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-mastercard me-1"></i> BCA
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck4">
                                        <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">3</a> </td>
                                <td>Juan Mitchell</td>
                                <td>
                                    06 Oct, 2019
                                </td>
                                <td>
                                    $384
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-success-subtle text-success font-size-12">Paid</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-mastercard me-1"></i> Mandiri
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck5">
                                        <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">4</a> </td>
                                <td>Barry Dick</td>
                                <td>
                                    05 Oct, 2019
                                </td>
                                <td>
                                    $412
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-success-subtle text-success font-size-12">Paid</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-mastercard me-1"></i> BCA
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck6">
                                        <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">5</a> </td>
                                <td>Ronald Taylor</td>
                                <td>
                                    04 Oct, 2019
                                </td>
                                <td>
                                    $404
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-warning-subtle text-warning font-size-12">Refund</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-visa me-1"></i> BCA
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">6</a> </td>
                                <td>Jacob Hunter</td>
                                <td>
                                    04 Oct, 2019
                                </td>
                                <td>
                                    $392
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-success-subtle text-success font-size-12">Paid</span>
                                </td>
                                <td>
                                    <i class="fab fa-cc-mastercard me-1"></i> Seabank
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 end table-responsive -->
            <!-- </div>
        </div>
    </div>
</div>  -->
<!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
