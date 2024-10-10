<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('medicine.index', [
            'medicines' => Medicine::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicine.create', [
            'medicines' => Medicine::all()
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
                'med_id' => 'required|string|max:50|unique:medicines,med_id',
                'med_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer',
                'med_quantity' => 'required|integer',
                'exp_date' => 'required|date',
                'file_photo' => 'required|string|max:200'
            ]
        )->validate();

        $medicine = new Medicine($validatedData);
        $in = $medicine->save();

        $id = $validatedData['med_id'];

        $success = "Data medicine id $id berhasil ditambahkan";
        $failed = "Data medicine id $id gagal ditambahkan";

        if ($in) {
            return redirect(route('medicine-index'))->with('success', $success);
        } else {
            return redirect(route('medicine-index'))->with('failed', $failed);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        return view('medicine.detail', [
            'medicine' => $medicine
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        $medicine->exp_date = date('Y-m-d', strtotime($medicine->exp_date));
        return view('medicine.edit', [
            'medicine' => $medicine
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validatedData = validator(
            $request->all(),
            [
                'med_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer',
                'med_quantity' => 'required|integer',
                'exp_date' => 'required|date',
                'file_photo' => 'required|string|max:200'
            ]
        )->validate();

        $in = $medicine->update($validatedData);

        $id = $validatedData['med_name'];

        $success = "Data med id $id berhasil diubah";
        $failed = "Data med id $id gagal diubah";

        if ($in) {
            return redirect(route('medicine-index'))->with('success', $success);
        } else {
            return redirect(route('medicine-index'))->with('failed', $failed);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        $id = $medicine->med_id;

        $success = "Data med id $id berhasil diubah";
        $failed = "Data med id $id gagal diubah";

        if ($medicine) {
            return redirect(route('medicine-index'))->with('success', $success);
        } else {
            return redirect(route('medicine-index'))->with('failed', $failed);
        }
    }


    public function dashboardProducts()
    {
        $popularProducts = DB::table('purchasing_details')
            ->select(
                'medicines.med_id',
                'medicines.med_name',
                'medicines.description',
                'medicines.price',
                'medicines.med_quantity',
                'medicines.exp_date',
                'medicines.file_photo',
                DB::raw('SUM(purchasing_details.qty) as total_quantity')
            )
            ->join('medicines', 'purchasing_details.med_id', '=', 'medicines.med_id')
            ->groupBy(
                'medicines.med_id',
                'medicines.med_name',
                'medicines.description',
                'medicines.price',
                'medicines.med_quantity',
                'medicines.exp_date',
                'medicines.file_photo',
            )
            ->orderByDesc('total_quantity')
            ->take(6)
            ->get();
        
        $latestProducts = Medicine::latest()->take(3)->get();

        return view('dashboard.index', [
            'popularProducts' => $popularProducts,
            'latestProducts' => $latestProducts
        ]);
    }
}
