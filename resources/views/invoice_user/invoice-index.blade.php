@extends('user-dashboard.master-user')
@section('body-class', 'invoice-background background-img')
@section('title', 'Lacak Pesanan Aktif')

@section('content')
    <div class="container mt-5">
        <h3 class="fw-bold mb-4 text-center">Pesanan Aktif Kamu</h3>

        @if($activeOrders->isEmpty())
            <div class="card shadow-sm border-0 rounded-4 p-5 text-center">
                <i class="bi bi-bag-x fs-1 text-muted"></i>
                <p class="mt-3 fs-5">Tidak ada pesanan yang sedang diproses.</p>
                <div class="mt-3">
                    <a href="{{ route('user.dashboard') }}" class="btn background-secondary fw-bold px-5 py-2 text-light">PESAN SEKARANG</a>
                </div>
            </div>
        @else
            @foreach($activeOrders as $paymentId => $items)
                @php 
                    $status = $items->first()->status_order; 
                    $totalPrice = 0;
                @endphp
                
                <div class="card border-black mb-5 shadow-sm">
                    <div class="card-header bg-white border-bottom-0 pt-5 px-5">
                        <p class="text-center invoice-title mb-4">
                            Your order is 
                            @if($status == 3)
                                <span class="text-success fw-700 text-uppercase">Ready for Pickup!</span>
                            @else
                                being <span class="color-primary fw-700">prepared</span>!
                            @endif
                        </p>

                        <div class="row justify-content-center mb-5">
                            <div class="col-11 col-md-9 d-flex justify-content-between position-relative">
                                <div class="progress position-absolute w-100" style="height: 4px; top: 20px; left: 0; z-index: 0;">
                                    <div class="progress-bar bg-success" style="width: {{ ($status - 1) * 50 }}%"></div>
                                </div>
                                
                                <div class="text-center z-1 bg-white px-2">
                                    <div class="rounded-circle {{ $status >= 1 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">Paid</p>
                                </div>

                                <div class="text-center z-1 bg-white px-2">
                                    <div class="rounded-circle {{ $status >= 2 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="bi bi-fire"></i>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">Preparing</p>
                                </div>

                                <div class="text-center z-1 bg-white px-2">
                                    <div class="rounded-circle {{ $status >= 3 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="bi bi-bag-check"></i>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">Ready</p>
                                </div>
                            </div>
                        </div>

                        <div class="alert {{ $status == 3 ? 'alert-success' : 'alert-light border text-muted' }} py-2 text-center mb-4 mx-md-5">
                            @if($status == 1) <i class="bi bi-info-circle me-2"></i>Pesanan diterima, menunggu antrean staf.
                            @elseif($status == 2) <i class="bi bi-hourglass-split me-2"></i>Staf Maranatha Store sedang menyiapkan pesananmu.
                            @elseif($status == 3) <i class="bi bi-megaphone-fill me-2"></i><strong>Silakan ambil di konter Maranatha Store sekarang!</strong>
                            @endif
                        </div>
                        <hr class="border-black">
                    </div>

                    <div class="card-body px-5">
                        <div class="row">
                            <div class="col-6">
                                <p class="fs-5 m-0 text-muted">Kode Pembayaran</p>
                                <p class="fs-3 fw-bold">{{ $paymentId }}</p>
                            </div>
                            <div class="col-6 d-flex align-items-center invoice-data">
                                <div class="text-end me-3 col-10">
                                    <p class="fw-bold m-0 text-uppercase">Maranatha Store</p>
                                    <p class="small m-0 text-muted">Jalan Surya Sumantri no.65</p>
                                    <p class="small text-muted">Update: {{ \Carbon\Carbon::parse($items->first()->updated_at)->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="col-2">
                                    <img class="invoice-logo" src="{{ asset('assets/images/logo.png') }}" alt="logo" width="50">
                                </div>
                            </div>
                        </div>

                        <div class="text-center fs-4 my-4 fw-bold text-uppercase" style="letter-spacing: 2px;">
                            Kwitansi Pembayaran
                        </div>

                        <table class="table table-borderless">
                            <thead class="border-bottom border-dark">
                                <tr>
                                    <th>Item Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    @php $totalPrice += ($item->price * $item->kuantiti_produk); @endphp
                                    <tr class="text-capitalize">
                                        <td>{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->kuantiti_produk }}</td>
                                        <td class="text-end">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-end">Rp {{ number_format($item->price * $item->kuantiti_produk, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="border-top border-dark">
                                <tr>
                                    <th colspan="3" class="text-end fs-5">TOTAL BAYAR</th>
                                    <th class="text-end fs-5 color-primary">Rp {{ number_format($totalPrice, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer bg-white border-top-0 pb-5 text-center">
                         <small class="text-muted italic">*Tunjukkan halaman ini ke kasir saat pengambilan barang.</small>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="mb-5 d-flex justify-content-center">
            <a href="{{ route('user.dashboard') }}" class="btn background-secondary fw-bold px-5 py-2 text-light">KEMBALI BELANJA</a>
        </div>
    </div>
@endsection

@section('footer')
    <div class="mt-5 bg-dark text-white text-center p-4">
        <p class="m-0">Maranatha Store</p>
        <p class="small text-muted">&copy; 2026 Maranatha Store | <a href="https://instagram.com/maranathastore.official" class="text-warning text-decoration-none" target="_blank">@maranathastore.official</a></p>
    </div>
@endsection

<script>
    // Refresh otomatis setiap 10 detik untuk memantau perubahan status dari admin
    setTimeout(function(){ 
        window.location.reload(1); 
    }, 10000); 
</script>