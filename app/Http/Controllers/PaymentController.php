<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.payment-index');
    }

    public function payView(){
        return view('payments.payment-pay');
    }
}
