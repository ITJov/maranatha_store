<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchasing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserInvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }
    
        $cartItems = DB::table('shop_carts')
            ->join('products', 'shop_carts.product_id', '=', 'products.id')
            ->select(
                'shop_carts.product_id',
                'shop_carts.kuantiti_produk as quantity',
                'products.name',
                'products.price'
            )
            ->where('shop_carts.user_id', Auth::id())
            ->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('payment.index')->with('error', 'Cart is empty.');
        }
    
        $nextPaymentId = IdGenerator::generate([
            'table' => 'payments',
            'field' => 'id',
            'length' => 10,
            'prefix' => 'PAY-',
        ]);
    
        DB::table('payments')->insert([
            'id' => $nextPaymentId,
            'payment_method' => 'va',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        $date = now();
        $totalPrice = 0;
    
        $purchasingIds = [];
        foreach ($cartItems as $item) {
            $nextPurchasingId = IdGenerator::generate([
                'table' => 'purchasings',
                'field' => 'id',
                'length' => 10,
                'prefix' => 'PRC-',
            ]);
    
            DB::table('purchasings')->insert([
                'id' => $nextPurchasingId,
                'product_id' => $item->product_id,
                'kuantiti_produk' => $item->quantity,
                'user_id' => auth()->id(),
                'date' => $date,
                'payment_id' => $nextPaymentId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            app('App\Http\Controllers\ProductController')->reduceStock($item->product_id, $item->quantity);
    
            $purchasingIds[] = $nextPurchasingId;
            $totalPrice += $item->quantity * $item->price;
        }
    
        foreach ($purchasingIds as $purchasingId) {
            $nextPurchasingsDetailId = IdGenerator::generate([
                'table' => 'purchasings_detail',
                'field' => 'id',
                'length' => 10,
                'prefix' => 'PRD-',
            ]);
    
            DB::table('purchasings_detail')->insert([
                'id' => $nextPurchasingsDetailId,
                'date' => $date,
                'total_price' => $totalPrice,
                'status_order' => 1,
                'purchasing_id' => $purchasingId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        DB::table('shop_carts')->where('user_id', auth()->id())->delete();
    
        $storeData = [
            'store_name' => 'Maranatha Store',
            'address' => 'Jalan Surya Sumantri No. 65',
            'order_time' => now()->format('d/m/Y - H:i'),
        ];
    
        return redirect()->route('order.status')->with('success', 'Pembayaran Berhasil! Pesananmu sedang diproses.');
    }
    
    public function historyInvoice()
    {
        $user = Auth::id();
        $purchasings = Purchasing::where('user_id', $user)
            ->orderBy('payment_id') 
            ->get();
    
        $invoices = [];
        $previousPaymentId = null;
        $products = [];
        $accumulatedPrice = 0;
    
        foreach ($purchasings as $purchase) {
            $product = Product::find($purchase->product_id); 
            
            if (!$product) {
                continue; 
            }
    
            $itemName = $product->name;
            $itemPrice = $product->price;
            $itemQuantity = $purchase->kuantiti_produk;
            $itemTotal = $purchase->kuantiti_produk * $itemPrice; 
    
            if ($purchase->payment_id !== $previousPaymentId) {
                if ($previousPaymentId !== null) {
                    $invoices[] = [
                        'id' => $previousPaymentId,
                        'totalPrice' => $accumulatedPrice,
                        'date' => $previousDate,
                        'products' => $products,
                        'kuantiti'=> $itemQuantity
                    ];
                }
    
                $previousPaymentId = $purchase->payment_id;
                $accumulatedPrice = $itemTotal;
                $previousDate = $purchase->date;
                $products = [];
            } else {
                $accumulatedPrice += $itemTotal;
            }
    
            $products[] = [
                'name' => $itemName,
                'quantity' => $purchase->kuantiti_produk,
                'price' => $itemPrice,
                'kuantiti'=> $itemQuantity,
                'total' => $itemTotal,
            ];
        }
    
        if ($previousPaymentId !== null) {
            $invoices[] = [
                'id' => $previousPaymentId,
                'totalPrice' => $accumulatedPrice,
                'date' => $previousDate,
                'products' => $products,
                'kuantiti'=> $itemQuantity,
            ];
        }
    
        return view('invoice_user.invoice-history', compact('invoices'));
    }

    public function showInvoice($id)
{
    $purchasingDetails = Purchasing::where('payment_id', $id)
        ->join('products', 'purchasings.product_id', '=', 'products.id')
        ->select('products.name', 'purchasings.kuantiti_produk as quantity', 'products.price')
        ->get();

    $totalPrice = $purchasingDetails->sum(function ($item) {
        return $item->quantity * $item->price;
    });

    $payment = DB::table('payments')->where('id', $id)->first();

    $storeData = [
        'store_name' => 'Maranatha Store',
        'address' => 'Jalan Surya Sumantri no.65',
        'order_time' => now()->format('d/m/Y - H:i'),
    ];

    return view('invoice_user.invoice-index', [
        'purchasing' => $purchasingDetails,
        'paymentId' => $id,
        'date' => $payment->created_at,
        'storeData' => $storeData,
        'totalPrice' => $totalPrice,
    ]);
    }

    public function trackStatus()
    {
        $userId = Auth::id();

        // Ambil semua pesanan aktif (status 1, 2, atau 3)
        $activeOrders = DB::table('purchasings_detail')
            ->join('purchasings', 'purchasings_detail.purchasing_id', '=', 'purchasings.id')
            ->join('products', 'purchasings.product_id', '=', 'products.id')
            ->select(
                'purchasings.payment_id',
                'purchasings_detail.status_order',
                'purchasings_detail.updated_at',
                'products.name as product_name',
                'products.price',
                'purchasings.kuantiti_produk'
            )
            ->where('purchasings.user_id', $userId)
            ->whereIn('purchasings_detail.status_order', [1, 2, 3])
            ->get()
            ->groupBy('payment_id'); 

        return view('invoice_user.invoice-index', compact('activeOrders'));
    }

}
