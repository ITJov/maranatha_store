<?php

namespace App\Http\Controllers;

use App\Models\Shop_Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $cartItems = collect($cart);

        $totalPrice = $cartItems->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('carts.cart-index', compact('cartItems', 'totalPrice'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Shop_Cart::findOrFail($id);

        $cartItem->kuantiti_produk = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Quantity updated successfully.',
        ]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
