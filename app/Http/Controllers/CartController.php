<?php

namespace App\Http\Controllers;

use App\Models\Shop_Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    // nampilin data di halamn cart
    public function index()
    {
        $userId = Auth::id();

        // Fetch cart items with related product and category
        $cartItems = Shop_Cart::where('user_id', $userId)
            ->with(['product.category']) // Include product and its category
            ->get()
            ->map(function ($cartItem) {
                return [
                    'id' => $cartItem->id,
                    'name' => $cartItem->product->name ?? 'Product not found',
                    'image' => $cartItem->product->file_photo ?? 'default.jpg',
                    'category_id' => $cartItem->product->category_id ?? 'Category not found',
                    'category_name' => $cartItem->product->category->name ?? 'Category not found', // Fetch category name
                    'price' => $cartItem->product->price ?? 0,
                    'quantity' => $cartItem->kuantiti_produk,
                    'total' => ($cartItem->product->price ?? 0) * $cartItem->kuantiti_produk,
                ];
            });
        // Calculate the total price of all items
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
        $userId = Auth::id(); // ID pengguna yang sedang login

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
    
        $product = Product::findOrFail($productId);
    
        // Periksa apakah stok produk cukup
        if ($product->kuantiti <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock.');
        }
    
        $userId = Auth::id();
        $cartItem = Shop_Cart::where('id_produk', $productId)->where('user_id', $userId)->first();
    
        if ($cartItem) {
            $cartItem->kuantiti_produk += $request->quantity;
    
            // Validasi jika stok kurang dari jumlah yang ditambahkan
            if ($cartItem->kuantiti_produk > $product->kuantiti) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
    
            $cartItem->save();
        } else {
            $nextId = Shop_Cart::max('id') + 1;
    
            Shop_Cart::create([
                'id' => $nextId,
                'id_produk' => $productId,
                'kuantiti_produk' => $request->quantity,
                'user_id' => $userId,
            ]);
        }
    
        return redirect()->back()->with('success', 'Item added to cart!');
    }
    

}
