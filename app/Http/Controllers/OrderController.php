<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchasing;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Purchasing::with(['user', 'details', 'products'])->paginate(10); 
        return view('ecommerce/orders-ecommerce', compact('orders'));
    }
}
