<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInvoiceController extends Controller
{
    public function generateInvoice()
    {
        // Ambil data cart dari sesi
        $cart = session()->get('cart', []);

        // Hitung total harga
        $totalPrice = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Cek apakah ada kode pesanan terakhir di session atau database
        $lastOrderCode = session()->get('last_order_code', 'P00000');

        // Ambil angka dari kode terakhir dan tambahkan 1
        $orderNumber = (int) substr($lastOrderCode, 1) + 1;

        // Buat kode pesanan baru
        $newOrderCode = 'P' . str_pad($orderNumber, 5, '0', STR_PAD_LEFT);

        // Simpan kode pesanan terbaru di session (atau database jika diperlukan)
        session()->put('last_order_code', $newOrderCode);

        // Data toko
        $storeData = [
            'store_name' => 'Maranatha Store',
            'address' => 'Jalan Surya Sumantri No. 65',
            'order_code' => $newOrderCode,
            'order_time' => now()->format('d/m/Y - H:i'),
        ];

        // Tampilkan halaman invoice dengan data
        return view('invoice_user.invoice-index', compact('cart', 'totalPrice', 'storeData'));
    }
}