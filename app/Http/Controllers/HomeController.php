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
        // Ambil tanggal dari request, jika tidak ada gunakan hari ini
        $date = $request->date ?? date('Y-m-d');

        // Ambil total pendapatan berdasarkan tanggal
        $totalRevenue = DB::table('purchasings_detail')
            ->join('purchasings', 'purchasings_detail.purchasing_id', '=', 'purchasings.id')
            ->whereDate('purchasings.date', $date)
            ->sum('purchasings_detail.total_price');

        // Ambil data produk berdasarkan tanggal
        $products = DB::table('purchasings')
            ->join('products', 'purchasings.id_produk', '=', 'products.id')
            ->whereDate('purchasings.date', $date)
            ->select('purchasings.id_produk', 'purchasings.kuantiti_produk', 'products.name')
            ->get();

        // Response untuk AJAX request
        if(request()->ajax()) {
            return response()->json([
                'products' => $products,
                'totalRevenue' => $totalRevenue
            ]);
        }

        return view('index', compact('totalRevenue', 'date'));
    }


    /*Language Translation*/
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
