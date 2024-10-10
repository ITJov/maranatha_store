<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Purchasing;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('delivery.index', [
            'deliveries' => Delivery::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('delivery.create', [
            'purchasing' => Purchasing::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator(
            $request->all(),
            [
                'delevery_id' => 'required|string|max:255|unique:deleveries, delevery_id',
                'purchase_id' => 'required|string|max:50',
                'track_order' => 'requried|string|max:200'
            ],
            [
                'delevery_id.required' => 'Delivery ID harus diisi',
                'purchase_id.required' => 'Purchase ID harus diisi',
                'track_order.required' => 'Track order harus diisi',
                'delevery_id.unique' => 'Delivery ID sudah terdaftar'
            ],
        )->validate();

        $delivery = new Delivery($validatedData);
        $delivery->save();

        $success = 'Data Delivery berhasil ditambahkan';
        $failed = 'Data Delivery gagal ditambahkan';

        if ($delivery) {
            return redirect(route('delivery-index'))->with('success', $success);
        } else {
            return redirect(route('delivery-index'))->with('failed', $failed);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', [
            'delivery' => $delivery,
            'purchasing' => Purchasing::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $validatedData = validator(
            $request->all(),
            [
                'delevery_id' => 'required|string|max:255|unique:deleveries, delevery_id',
                'purchase_id' => 'required|string|max:50',
                'track_order' => 'requried|string|max:200'
            ],
            [
                'delevery_id.required' => 'Delivery ID harus diisi',
                'purchase_id.required' => 'Purchase ID harus diisi',
                'track_order.required' => 'Track order harus diisi',
                'delevery_id.unique' => 'Delivery ID sudah terdaftar'
            ],
        )->validate();

        $delivery -> delevery_id = $validatedData['delevery_id'];
        $delivery -> purchase_id = $validatedData['purchase_id'];
        $delivery -> track_order = $validatedData['track_order'];
        $delivery -> save();
        
        $id = $validatedData['delevery_id'];
        $success = "Data Delivery dengan id $id berhasil diubah";
        $failed = "Data Delivery dengan id $id gagal diubah";

        if ($delivery) {
            return redirect(route('delivery-index'))->with('success', $success);
        } else {
            return redirect(route('delivery-index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        $id = $delivery->delevery_id;

        $success = "Data Delivery dengan id $id berhasil dihapus";
        $failed = "Data Delivery dengan id $id gagal dihapus";

        if ($delivery) {
            return redirect(route('delivery-index'))->with('success', $success);
        } else {
            return redirect(route('delivery-index'))->with('failed', $failed);
        }
    }
}
