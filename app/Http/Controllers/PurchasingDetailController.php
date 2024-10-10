<?php

namespace App\Http\Controllers;

use App\Models\Purchasing_Detail;
use Illuminate\Http\Request;

class PurchasingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchasing_detail.index', [
            // 'purchasing_detail' => Purchasing_Detail::find
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchasing_Detail $purchasing_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchasing_Detail $purchasing_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchasing_Detail $purchasing_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchasing_Detail $purchasing_Detail)
    {
        //
    }
}
