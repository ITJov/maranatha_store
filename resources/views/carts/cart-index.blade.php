@extends('user-dashboard.master-user')
@section('body-class', 'cart-background')
@section('title', 'Your Cart')

@section('content')
    <div class="container">
        <!-- Tombol Back -->
        <div class="mb-3 mt-3">
            <button class="btn btn-secondary" onclick="history.back()">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>

        <!-- Konten Cart -->
        <h1 class="text-center mb-5 fw-bold">Your Cart</h1>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th class="text-start">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
                <th class="text-end">Total</th>
            </tr>
            </thead>
            <tbody>
            @if (!$cartItems || $cartItems->isEmpty())
                <tr>
                    <td colspan="5" style="height: 200px; background: rgba(0,0,0,0)">
                        <p class="d-flex align-items-center justify-content-center h-100">Your cart is empty. Start shopping now!</p>
                    </td>
                </tr>
            @else
                @foreach ($cartItems as $id => $item)
                    <tr class="text-center">
                        <td style="background: rgba(0,0,0,0)" class="text-start text-capitalize">{{ $item['name'] ?? 'Product not found' }}</td>
                        <td>Rp {{ number_format($item['price'] ?? 0, 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                        <td class="text-end">Rp {{ number_format(($item['price'] ?? 0) * $item['quantity'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="text-end">
            <h4 id="total-price">Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</h4>
            <a href="{{ route('payment.index') }}" class="btn btn-success">Check Out</a>
        </div>
    </div>
@endsection
