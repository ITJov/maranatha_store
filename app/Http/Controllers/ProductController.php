<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'products' => product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:10|unique:products,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'kuantiti' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'file_photo' => 'required|string|max:255',
        ]);
        
        $product = new Product($validatedData);
        $in = $product->save();
        
        $id = $validatedData['id'];
        
        $success = "Data product id $id berhasil ditambahkan";
        $failed = "Data product id $id gagal ditambahkan";
        
        if ($in) {
            return redirect(route('product-index'))->with('success', $success);
        } else {
            return redirect(route('product-index'))->with('failed', $failed);
        } 
    }          

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {

    }

}
