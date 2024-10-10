<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Purchasing;
use App\Models\Purchasing_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $medicine = Medicine::find($request->med_id);

        if (!$medicine) {
            return redirect()->route('cart')->with('error', 'Medicine not found!');
        }

        $quantity = $medicine->quantity;

        $cart = session()->get('cart', []);

        if (isset($cart[$medicine->med_id])) {
            $cart[$medicine->med_id]['quantity'] += $quantity;
        } else {
            $cart[$medicine->med_id] = [
                "name" => $medicine->med_name,
                "quantity" => $quantity,
                "price" => $medicine->price,
                "photo" => $medicine->file_photo
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        return view('cart.cart');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();
        try {
            // Calculate total purchase
            $totalPurchase = array_sum(array_map(function($details) {
                return $details['price'] * $details['quantity'];
            }, $cart));

            // Create a new purchasing record
            $purchaseId = Str::uuid()->toString(); // Generate a unique purchase ID
            $purchasing = Purchasing::create([
                'purchase_id' => $purchaseId,
                'user_id' => 'USR001', // assuming user is authenticated
                'date' => now(),
                'address' => 'DIMANA-MANA HATIKU SENANG', // assuming address is passed from the form
                'status_order' => 'Pending', // initial status
                'total_purchase' => $totalPurchase,
                'total_payment' => $totalPurchase // assuming total payment is same as total purchase
            ]);

            // Create purchasing detail records
            foreach ($cart as $med_id => $details) {
                Purchasing_Detail::create([
                    'detail_id' => Str::uuid()->toString(), // Generate a unique detail ID
                    'med_id' => $med_id,
                    'purchase_id' => $purchaseId,
                    'qty' => $details['quantity'],
                    'price' => $details['price'],
                    'total_price' => $details['price'] * $details['quantity'],
                ]);
            }

            DB::commit();
            session()->forget('cart');
            return redirect()->route('cart')->with('success', 'Transaction completed successfully! Your cart has been cleared.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart')->with('error', 'Transaction failed! Please try again later.');
        }
    }

}
