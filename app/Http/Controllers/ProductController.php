<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);

        $categories = DB::table('products')->select('kategori')->distinct()->pluck('kategori');

        return view('ecommerce.product-ecommerce', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('products')->select('kategori')->distinct()->pluck('kategori');

        return view('ecommerce.create-product-ecommerce', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'kuantiti' => 'required|integer',
            'kategori' => 'nullable|string|max:255',
            'new_category' => 'nullable|string|max:255',
            'file_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = $request->input('new_category') ? $request->input('new_category') : $request->input('kategori');

        $id = IdGenerator::generate(['table' => 'products', 'length' => 10, 'prefix' => 'PRD-']);

        $destinationPath = public_path('assets/images/product');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $file = $request->file('file_photo');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        Product::create([
            'id' => $id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'kuantiti' => $validatedData['kuantiti'],
            'kategori' => $category,
            'file_photo' => 'assets/images/product/' . $fileName, 
        ]);

        return redirect()->route('product-ecommerce')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = DB::table('products')->select('kategori')->distinct()->pluck('kategori');

        return view('ecommerce.edit-product-ecommerce', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $id,
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'kuantiti' => 'required|integer',
            'kategori' => 'nullable|string|max:255',
            'file_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('file_photo')) {
            if ($product->file_photo && File::exists(public_path($product->file_photo))) {
                File::delete(public_path($product->file_photo));
            }
    
            $file = $request->file('file_photo');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/product'), $fileName);
    
            $product->file_photo = 'assets/images/product/' . $fileName;
        }
    
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? $product->description,
            'price' => $validatedData['price'],
            'kuantiti' => $validatedData['kuantiti'],
            'kategori' => $validatedData['kategori'],
        ]);
    
        return redirect()->route('product-ecommerce')->with('success', 'Produk berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->file_photo && File::exists(public_path($product->file_photo))) {
            File::delete(public_path($product->file_photo));
        }

        $product->delete();

        return redirect()->route('product-ecommerce')->with('success', 'Produk berhasil dihapus');
    }
}
