<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productRecommend = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('category')
            ->take(4)
            ->get();

        return view('product.detail-product-index', compact('product', 'productRecommend'));
    }

}
