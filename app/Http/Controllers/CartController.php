<?php

namespace App\Http\Controllers;

use App\Models\Shop_Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // nampilin data di halamn cart
    public function index()
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login

        // Mengambil data keranjang dari database dengan relasi ke produk
        $cartItems = Shop_Cart::where('user_id', $userId)
            ->with('product') // Mengambil relasi dengan produk
            ->get()
            ->map(function ($cartItem) {
                return [
                    'id' => $cartItem->id,
                    'name' => $cartItem->product->name ?? 'Product not found',
                    'image' => $cartItem->product->file_photo ?? 'default.jpg',
                    'kategori' => $cartItem->product->kategori ?? 'Category not found',
                    'price' => $cartItem->product->price ?? 0,
                    'quantity' => $cartItem->kuantiti_produk,
                    'total' => ($cartItem->product->price ?? 0) * $cartItem->kuantiti_produk,
                ];
            });

        // Hitung total harga seluruh item
        $totalPrice = $cartItems->sum('total');

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
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login

        // Cari data keranjang berdasarkan id produk dan id pengguna
        $cartItem = Shop_Cart::where('id', $id)->where('user_id', $userId)->first();

        if ($cartItem) {
            $cartItem->delete(); // Hapus data dari database
            return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found!');
    }


    public function addToCart(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        // Cek apakah item sudah ada di keranjang
        $cartItem = Shop_Cart::where('id', $productId)->where('user_id', $userId)->first();

        if ($cartItem) {
            // Jika sudah ada, tambahkan kuantitasnya
            $cartItem->kuantiti_produk += $request->quantity;
            $cartItem->save();
        } else {
            // Jika belum ada, buat entri baru
            Shop_Cart::create([
                'id' => $productId,
                'kuantiti_produk' => $request->quantity,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

}
