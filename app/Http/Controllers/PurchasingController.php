<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Purchasing;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchasing.index', [
            'purchases' => Purchasing::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchasing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            'purchase_id' => 'required|string|max:50|unique:purchasing,purchase_id',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'status_order' => 'required|integer',
            'total_purchase' => 'required|integer',
            'total_payment' => 'required|integer',
        ]);

        $validatedData['user_id'] = $user_id;

        $purchasing = new Purchasing($validatedData);
        $purchasing->save();

        $name = $validatedData['purchase_id'];
        $success = "Data Purchase ID $name berhasil ditambah";
        $failed = "Data Purchase ID $name gagal ditambah";

        if ($purchasing) {
            return redirect(route('purchasing.index'))->with('success', $success);
        } else {
            return redirect(route('purchasing.index'))->with('failed', $failed);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Purchasing $purchasing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchasing $purchasing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchasing $purchasing)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            'purchase_id' => 'required|string|max:50|unique:purchasing,purchase_id',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'status_order' => 'required|integer',
            'total_purchase' => 'required|integer',
            'total_payment' => 'required|integer',
        ]);

        $validatedData['user_id'] = $user_id;

        $purchasing->update($validatedData);

        $name = $validatedData['purchase_id'];
        $success = "Data Purchase ID $name berhasil diubah";
        $failed = "Data Purchase ID $name gagal diubah";

        if ($purchasing) {
            return redirect(route('purchasing.index'))->with('success', $success);
        } else {
            return redirect(route('purchasing.index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchasing $purchasing)
    {
        $purchasing->delete();
        $name = $purchasing->purchase_id;
        $success = "Data Purchase ID $name berhasil dihapus";
        $failed = "Data Purchase ID $name gagal dihapus";

        if ($purchasing) {
            return redirect(route('purchasing.index'))->with('success', $success);
        } else {
            return redirect(route('purchasing.index'))->with('failed', $failed);
        }
    }
}
