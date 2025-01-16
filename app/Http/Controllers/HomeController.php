<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root(Request $request)
    {
        try {
            // Set default date to today if not provided
            $date = $request->date ?? now()->format('Y-m-d');

            // Get total revenue for the selected date
            $totalRevenue = DB::table('purchasings_detail')
                ->join('purchasings', 'purchasings_detail.purchasing_id', '=', 'purchasings.id')
                ->whereDate('purchasings.date', $date)
                ->sum('purchasings_detail.total_price');

            // Get product data for the selected date
            $products = DB::table('purchasings')
                ->join('products', 'purchasings.id_produk', '=', 'products.id')
                ->whereDate('purchasings.date', $date)
                ->select(
                    'purchasings.id_produk',
                    'purchasings.kuantiti_produk',
                    'products.name'
                )
                ->get();

            // Handle AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'products' => $products,
                    'totalRevenue' => $totalRevenue
                ]);
            }

            // Regular page load
            return view('index', [
                'totalRevenue' => $totalRevenue,
                'date' => $date,
                'products' => $products
            ]);

        } catch (\Exception $e) {
<<<<<<< Updated upstream
=======
            // Log the error if needed
            \Log::error('Dashboard Error: ' . $e->getMessage());

>>>>>>> Stashed changes
            // Return view with default values
            return view('index', [
                'totalRevenue' => 0,
                'date' => now()->format('Y-m-d'),
                'products' => collect([])
            ]);
        }
    }

<<<<<<< Updated upstream
=======
//    /Language Translation/
>>>>>>> Stashed changes
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function FormSubmit(Request $request)
    {
        return view('form-repeater');
    }
}