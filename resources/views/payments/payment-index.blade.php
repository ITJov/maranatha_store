@extends('user-dashboard.master-user')

@section('title', 'Payment')

@section('content')
<div class="container text-center">
    <h1>Copy this <span class="text-warning">virtual account</span> to make Payments</h1>
    <div class="card mt-5 mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title">BCA Virtual Account</h4>
            <p class="card-text text-primary fs-4">
                No: <strong>141670000000</strong>
            </p>
            <a href="{{ route('invoice.index') }}" class="btn btn-success">Copy</a>
            </div>
    </div>
    <p class="mt-5 text-muted">Copyright &copy; 2024 Maranatha Store</p>
</div>
@endsection

@push('scripts')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Virtual account number copied to clipboard!');
        }).catch(err => {
            alert('Failed to copy virtual account number.');
        });
    }
</script>
@endpush
