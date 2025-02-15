<?php

namespace App\Http\Controllers;

use App\Models\Shop_Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $cartItems = Shop_Cart::where('user_id', $userId)
            ->with(['product.category']) 
            ->get()
            ->map(function ($cartItem) {
                return [
                    'id' => $cartItem->id,
                    'name' => $cartItem->product->name ?? 'Product not found',
                    'image' => $cartItem->product->file_photo ?? 'default.jpg',
                    'category_id' => $cartItem->product->category_id ?? 'Category not found',
                    'category_name' => $cartItem->product->category->name ?? 'Category not found', 
                    'price' => $cartItem->product->price ?? 0,
                    'quantity' => $cartItem->kuantiti_produk,
                    'total' => ($cartItem->product->price ?? 0) * $cartItem->kuantiti_produk,
                ];
            });
        $totalPrice = $cartItems->sum('total');

        return view('carts.cart-index', compact('cartItems', 'totalPrice'));
    }



    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|string|in:increase,decrease',
        ]);
    
        $cartItem = Shop_Cart::findOrFail($id);
        $product = Product::findOrFail($cartItem->id_produk);
    
        if ($request->action === 'increase') {
            if ($cartItem->kuantiti_produk + 1 > $product->kuantiti) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
    
            $cartItem->kuantiti_produk += 1;
        } elseif ($request->action === 'decrease') {
            $cartItem->kuantiti_produk -= 1;
    
            if ($cartItem->kuantiti_produk <= 0) {
                $cartItem->delete();
                return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
            }
        }
    
        $cartItem->save();
    
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    
    public function remove($id)
    {
        $userId = Auth::id(); // ID pengguna yang sedang login

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
    
        if ($product->kuantiti <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock.');
        }
    
        $userId = Auth::id();
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }
        $cartItem = Shop_Cart::where('id_produk', $productId)->where('user_id', $userId)->first();

        if ($cartItem) {
            $cartItem->kuantiti_produk += $request->quantity;
    
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
