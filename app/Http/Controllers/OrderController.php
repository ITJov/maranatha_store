<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchasing;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan riwayat semua pesanan (Laporan Umum)
     */
    public function index()
    {
        $orders = Purchasing::with(['details', 'user', 'product'])->paginate(10);
        return view('ecommerce.orders-ecommerce', compact('orders'));
    }

    /**
     * Menampilkan antrean pesanan yang sedang diproses (Manajemen Operasional)
     */
    public function management()
    {
        $orders = DB::table('purchasings_detail')
            ->join('purchasings', 'purchasings_detail.purchasing_id', '=', 'purchasings.id')
            ->join('products', 'purchasings.product_id', '=', 'products.id') // Sesuaikan ke product_id
            ->join('users', 'purchasings.user_id', '=', 'users.id')
            ->select(
                'purchasings_detail.id as detail_id',
                'purchasings.payment_id',
                'users.name as customer_name',
                'products.name as product_name',
                'purchasings.kuantiti_produk',
                'purchasings_detail.status_order',
                'purchasings_detail.updated_at'
            )
            ->whereIn('purchasings_detail.status_order', [1, 2, 3]) // Hanya tampilkan yang belum selesai/diambil
            ->orderBy('purchasings_detail.updated_at', 'desc')
            ->get();

        return view('ecommerce.orders-status-management', compact('orders'));
    }

    /**
     * Memperbarui status pesanan (Trigger dari sisi Admin)
     */
    public function updateStatus(Request $request, $id)
    {
        DB::table('purchasings_detail')
            ->where('id', $id)
            ->update([
                'status_order' => $request->status,
                'updated_at' => now()
            ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}