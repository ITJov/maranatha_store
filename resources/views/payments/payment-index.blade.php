@extends('user-dashboard.master-user')

@section('title', 'Payment')

@section('content')
<div class="container text-center">
    <h1>Copy this <span class="text-warning">virtual account</span> to make Payments</h1>
    <div class="card mt-5 mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title">BCA Virtual Account</h4>
            <p class="card-text text-primary fs-4">
                No: <strong id="virtualAccount">141670000000</strong>
            </p>
            <form id="copyForm" action="{{ route('invoice.index') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success" id="copyButton">Copy</button>
            </form>
        </div>
    </div>
    <p class="mt-5 text-muted">Copyright &copy; 2024 Maranatha Store</p>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('copyForm').addEventListener('submit', function(event) {
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
