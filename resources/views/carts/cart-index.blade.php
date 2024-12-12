@extends('user-dashboard.master-user')

@section('title', 'Your Cart')

@section('content')
<div class="container">
    <!-- Tombol Back -->
    <div class="mb-3">
        <button class="btn btn-secondary" onclick="history.back()">
            <i class="bi bi-arrow-left"></i> Back
        </button>
    </div>

    <!-- Konten Cart -->
    <h1 class="text-center mt-5">Your Cart</h1>
    @if (!$cartItems || $cartItems->isEmpty())
        <p class="text-center">Your cart is empty. Start shopping now!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $id => $item)
            <tr>
                <td>{{ $item['name'] ?? 'Product not found' }}</td>
                <td>Rp {{ number_format($item['price'] ?? 0, 0, ',', '.') }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp {{ number_format(($item['price'] ?? 0) * $item['quantity'], 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <h4 id="total-price">Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</h4>
        <button class="btn btn-success">Check Out</button>
    </div>
    @endif
</div>
@endsection
