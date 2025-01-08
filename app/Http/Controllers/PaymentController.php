<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.payment-index');
    }

    public function sendBank(Request $request)
    {
        $bank = $request->input('bank');
        // Lakukan sesuatu dengan $bank
        return redirect()->back()->with('message', 'Bank berhasil dipilih: ' . $bank);
    }


    public function payView(Request $request)
    {
        $bank = $request->input('bank');
        $vaNumber = mt_rand(1000000000000000, 9999999999999999);

        return view('payments.payment-pay', compact('bank', 'vaNumber'));
    }
}
