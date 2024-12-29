<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productRecommend = Product::where('kategori', $product->kategori)->where('id', '!=', $product->id)->take(4)->get();

        return view('product.detail-product-index', compact('product', 'productRecommend'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->kuantiti,
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $request->quantity,
                "image" => $product->file_photo,
                "kategori" => $product->kategori,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!')->withInput();
    }
}
