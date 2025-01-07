<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchasing;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Purchasing::with(['details', 'user', 'product'])->paginate(10); // relasi

        return view('ecommerce.orders-ecommerce', compact('orders'));
    }
}
