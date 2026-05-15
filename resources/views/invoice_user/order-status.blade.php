@extends('user-dashboard.master-user')
@section('title', 'Status Pesanan Aktif')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-5 text-center">Pesanan Aktif Kamu</h3>

    @if($activeOrders->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-bag-x fs-1 text-muted"></i>
            <p class="mt-3">Tidak ada pesanan yang sedang diproses.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Pesan Sekarang</a>
        </div>
    @else
        @foreach($activeOrders as $paymentId => $items)
            @php $status = $items->first()->status_order; @endphp
            
            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="badge bg-dark">ID: {{ $paymentId }}</span>
                        <small class="text-muted">Terakhir diperbarui: {{ \Carbon\Carbon::parse($items->first()->updated_at)->format('H:i') }} WIB</small>
                    </div>

                    <div class="row justify-content-center mb-5">
                        <div class="col-11 d-flex justify-content-between position-relative">
                            <div class="progress position-absolute w-100" style="height: 4px; top: 20px; left: 0; z-index: 0;">
                                <div class="progress-bar bg-success" style="width: {{ ($status - 1) * 50 }}%"></div>
                            </div>
                            
                            <div class="text-center z-1 bg-white px-2">
                                <div class="rounded-circle {{ $status >= 1 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                    <i class="bi bi-check-lg"></i>
                                </div>
                                <p class="small mt-2 mb-0">Paid</p>
                            </div>

                            <div class="text-center z-1 bg-white px-2">
                                <div class="rounded-circle {{ $status >= 2 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                    <i class="bi bi-fire"></i>
                                </div>
                                <p class="small mt-2 mb-0">Preparing</p>
                            </div>

                            <div class="text-center z-1 bg-white px-2">
                                <div class="rounded-circle {{ $status >= 3 ? 'bg-success' : 'bg-secondary' }} text-white d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                                <p class="small mt-2 mb-0">Ready</p>
                            </div>
                        </div>
                    </div>

                    <div class="alert {{ $status == 3 ? 'alert-success' : 'alert-light border' }} py-2 text-center mb-3">
                        @if($status == 1) Pesanan diterima, menunggu antrean.
                        @elseif($status == 2) Staf sedang menyiapkan pesananmu.
                        @elseif($status == 3) <strong>Silakan ambil di konter!</strong>
                        @endif
                    </div>

                    <div class="accordion accordion-flush" id="accordion{{ $paymentId }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-2 px-0 bg-transparent text-primary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush{{ $paymentId }}">
                                    Lihat Detail Kwitansi
                                </button>
                            </h2>
                            <div id="flush{{ $paymentId }}" class="accordion-collapse collapse" data-bs-parent="#accordion{{ $paymentId }}">
                                <div class="accordion-body px-0">
                                    <table class="table table-sm small">
                                        @php $total = 0; @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="text-capitalize">{{ $item->product_name }} x{{ $item->kuantiti_produk }}</td>
                                                <td class="text-end">Rp {{ number_format($item->price * $item->kuantiti_produk, 0, ',', '.') }}</td>
                                            </tr>
                                            @php $total += ($item->price * $item->kuantiti_produk); @endphp
                                        @endforeach
                                        <tr class="fw-bold border-top">
                                            <td>Total Bayar</td>
                                            <td class="text-end text-success">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <div class="text-center mt-5">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary px-5">Kembali Belanja</a>
    </div>
</div>

<script>
    setTimeout(function(){ window.location.reload(1); }, 10000); // Refresh tiap 10 detik
</script>
@endsection