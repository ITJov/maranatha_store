<?php

namespace App\Http\Controllers;

use App\Models\Shop_Cart;
use App\Models\Purchasing;
use App\Models\Purchasing_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Shop_Cart::with('product')
        ->where('user_id', Auth::id()) 
        ->get();

    return view('carts.cart-index', compact('cartItems'));    }
    
    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Shop_Cart::findOrFail($id);
    
        $cartItem->kuantiti_produk = $request->quantity;
        $cartItem->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Quantity updated successfully.',
        ]);
    }
}
