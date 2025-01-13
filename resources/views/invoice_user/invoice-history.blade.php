@extends('user-dashboard.master-user')
@section('body-class', 'history-background background-img')
@section('title', 'History Receipt')

@section('content')
    <div class="container">
        <div class="my-4">
            <p class="history-title"><span class="color-primary">PURCHASE</span> HISTORY</p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Purchase ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Products</th>
                        <th class="text-center">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @if(empty($invoices) || count($invoices) == 0)
                        <tr>
                            <td colspan="4">You don't have a transaction history yet</td>
                        </tr>
                    @else
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice['id'] }}</td>
                                <td>{{ $invoice['date'] }}</td>
                                <td>
                                    <ul class="text-start list-group list-group-numbered m-0 p-0">
                                        @foreach($invoice['products'] as $product)
                                            <li class="list-group-item">{{ $product['name'] }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>Rp {{ number_format($invoice['totalPrice'], 0, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
