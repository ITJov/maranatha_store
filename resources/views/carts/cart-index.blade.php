@extends('user-dashboard.master-user')
@section('body-class', 'cart-background')
@section('title', 'Your Cart')

@section('content')
    <div class="container">
        <!-- Tombol Back -->
        <div class="mb-3 mt-5">
            <button class="btn btn-outline-secondary" onclick="history.back()">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>

        <!-- Konten Cart -->
        <h1 class="text-center mb-5 fw-bold">Your Cart</h1>
        <table class="table">
            <thead>
            <tr class="text-end text-uppercase">
                <th class="text-start">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th class="text-center ps-5">Action</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @if (!$cartItems || $cartItems->isEmpty())
                <tr>
                    <td colspan="5" style="height: 200px; background: rgba(0,0,0,0)">
                        <p class="d-flex align-items-center justify-content-center h-100">Your cart is empty. Start
                            shopping now!</p>
                    </td>
                </tr>
            @else
                @foreach ($cartItems as $id => $item)
                    <tr class="cart-table text-end">
                        <td class="text-start text-capitalize d-flex align-items-center">
                            <div class="me-5 my-3">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                     class="cart-product-img">
                            </div>
                            <div>
                                <h5>{{ $item['name'] ?? 'Product not found' }}</h5>
                                <p class="m-0">{{$item['category_name'] ?? 'Category not found'}}</p>
                            </div>
                        </td>
                        <td><p>Rp {{ number_format($item['price'] ?? 0, 0, ',', '.') }}</p></td>
                        <td class="pe-5"><p>{{ $item['quantity'] }}</p></td>
                        <td>
                            <form action="{{ route('cart.updateQuantity', $item['id']) }}" method="POST" class=" ps-5 d-flex align-items-center justify-content-center">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">-</button>
                                <input type="text" value="{{ $item['quantity'] }}" class="form-control text-center mx-2" style="width: 50px;" disabled>
                                <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">+</button>
                            </form>
                        </td>
                        <td><p>Rp {{ number_format(($item['price'] ?? 0) * $item['quantity'], 0, ',', '.') }}</p></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="mt-5 mb-3">
            <div class="d-flex justify-content-end">
                <h4 class="me-5">Total</h4>
                <h4 class="ms-5" id="total-price">Rp {{ number_format($totalPrice, 0, ',', '.') }}</h4>
            </div>
            <div class="d-flex justify-content-end">
                @if(!$cartItems || $cartItems->isEmpty())
                    <button class="btn btn-success mt-4 w-25" disabled>CHECK OUT</button>
                @else
                    <a href="{{ route('payment.index') }}" class="btn btn-success mt-4 w-25">CHECK OUT</a>
                @endif
            </div>
        </div>
    </div>
@endsection