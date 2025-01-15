@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Maranatha Store @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="align-items-center">
    <div class="col-md-6 w-100">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1 mt-1">Rp.<span id="revenue-display" data-plugin="counterup">{{ number_format($totalRevenue ?? 0) }}</span></h4>
                    <p class="text-muted mb-0">Total Revenue</p>
                </div>
                <div class="form-group mb-0">
                    <input type="date" class="form-control" id="datePicker" value="{{ $date }}">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-1">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Product Statistics</h4>
                <canvas id="productChart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let productChart = null;

    $(document).ready(function() {
        loadData($('#datePicker').val());

        // Event listener untuk perubahan tanggal
        $('#datePicker').change(function() {
            loadData($(this).val());
        });
    });

    function loadData(date) {
        $.ajax({
            url: "{{ route('home') }}",
            type: "GET",
            data: { date: date },
            dataType: "json",
            success: function(response) {
                // Update total revenue
                $('#revenue-display').text(numberFormat(response.totalRevenue));

                // Update chart
                updateChart(response.products);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function updateChart(products) {
        if (productChart) {
            productChart.destroy();
        }

        const labels = products.map(item => item.name);
        const quantities = products.map(item => item.kuantiti_produk);

        const ctx = document.getElementById('productChart').getContext('2d');
        productChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Product',
                    data: quantities,
                    backgroundColor: 'rgb(254, 151, 47)',
                    borderColor: 'rgba(254, 151, 47)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Product Name'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Statistik Kuantiti Produk'
                    }
                }
            }
        });
    }

    function numberFormat(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }
</script>
@endsection