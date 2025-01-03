<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {
        // Ambil data dari tabel shop_carts dengan join ke tabel products
        $cartItems = DB::table('shop_carts')
            ->join('products', 'shop_carts.id_produk', '=', 'products.id') // Sesuaikan dengan id_produk
            ->select(
                'shop_carts.id_produk',
                'shop_carts.kuantiti_produk as quantity',
                'products.name',
                'products.price'
            )
            ->where('shop_carts.user_id', auth()->id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('payment.index')->with('error', 'Cart is empty.');
        }

        // Generate payment ID secara increment
        $lastPayment = DB::table('payments')->orderBy('id', 'desc')->first();
        $nextPaymentId = $lastPayment
            ? sprintf('P%06d', (int)substr($lastPayment->id, 1) + 1)
            : 'P000001';

        // Tambahkan entri ke tabel payments
        DB::table('payments')->insert([
            'id' => $nextPaymentId,
            'payment_method' => 'va', // Virtual Account
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tanggal saat ini
        $date = now();

        // Pindahkan data dari shop_carts ke purchasings
        foreach ($cartItems as $item) {
            $nextPurchasingId = DB::table('purchasings')->max('id') + 1; // Auto-increment ID untuk purchasings

            DB::table('purchasings')->insert([
                'id' => $nextPurchasingId, // Auto-increment ID
                'id_produk' => $item->id_produk,
                'kuantiti_produk' => $item->quantity,
                'user_id' => auth()->id(),
                'date' => $date,
                'payment_id' => $nextPaymentId, // Menghubungkan ke tabel payments
            ]);
        }

        // Hapus data dari shop_carts
        DB::table('shop_carts')->where('user_id', auth()->id())->delete();

        // Data toko untuk halaman invoice
        $storeData = [
            'store_name' => 'Maranatha Store',
            'address' => 'Jalan Surya Sumantri No. 65',
            'order_time' => now()->format('d/m/Y - H:i'),
        ];

        // Hitung total harga
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Kirim data ke halaman invoice
        return view('invoice_user.invoice-index', [
            'purchasing' => $cartItems,
            'paymentId' => $nextPaymentId,
            'date' => $date,
            'storeData' => $storeData,
            'totalPrice' => $totalPrice,
        ]);
    }
}
