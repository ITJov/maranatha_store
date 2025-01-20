<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('hidden', false) 
            ->latest()                             
            ->take(4)                               
            ->get();
    
        return view('user-dashboard.index', compact('products'));
    }
}
