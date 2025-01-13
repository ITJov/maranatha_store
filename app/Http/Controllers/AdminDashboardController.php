<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil total pendapatan
        $totalRevenue = DB::table('purchasings_detail')->sum('total_price');

        // Return ke view yang sesuai
        return view('index', compact('totalRevenue'));

    }
}
