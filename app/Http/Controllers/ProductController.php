<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $selectedCategory;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('hidden', false)
                       ->orderBy('created_at', 'desc')
                       ->with('category')
                       ->paginate(10);

    return view('ecommerce.product-ecommerce', compact('products'));
    }

    public function hide($id)
    {
        $product = Product::findOrFail($id);

        $product->hidden = true;
        $product->save();

        return redirect()->route('product-ecommerce')->with('success', 'Product has been hidden successfully!');
    }

    public function unhide($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::find($product->category_id);
        if($category->hidden){
            return redirect()->route('product.hidden')->with('message','Category is already hidden');
        }
        $product->hidden = false;
        $product->save();

        return redirect()->route('product-ecommerce')->with('success', 'Product unhidden successfully!');
    }

    public function hiddenProducts()
    {
        $products = Product::where('hidden', true)->paginate(10);
        return view('ecommerce.product-hide-ecommerce', compact('products'));
    }


    public function filterByCategory($category_id)
    {
        $products = Product::where('category_id', $category_id)
            ->where('hidden',false)->get();
        return view('product.index', compact('products'));
    }


    /**
     * Display a listing of the resource for user.
     */
    public function showUser()
    {
        $products = Product::where('hidden', false) // Filter produk yang tidak di-hide
        ->orderBy('created_at', 'desc')        // Urutkan produk terbaru
        ->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('ecommerce.create-product-ecommerce', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'kuantiti' => 'required|integer',
            'category' => 'string|max:10',
            'new_category' => 'nullable|string|max:255',
            'file_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika produk sudah ada berdasarkan nama
        if (Product::where('name', $validatedData['name'])->exists()) {
            return redirect()->back()->with('error', 'The product already exists.');
        }

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
            'category_id' => $validatedData['category'],
            'file_photo' => 'assets/images/product/' . $fileName,
        ]);

        return redirect()->route('product-ecommerce')->with('success', 'Product added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

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
            'category' => 'nullable|string|max:255',
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
            'category_id' => $validatedData['category'],
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

    public function show($id)
    {
        $user = Product::findOrFail($id);

        return view('customers.show-customer', compact('user'));
    }

    public function addStock(Request $request,$id){
        $request->validate([
            'additional_stock' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);

        $product->kuantiti += $request->input('additional_stock');
        $product->save();

        return redirect()->route('product-ecommerce')->with('success', 'Stock added successfully!');
    }

    public function reduceStock($productId, $quantity)
    {
        $product = Product::findOrFail($productId);

        if ($product->kuantiti < $quantity) {
            return response()->json([
                'message' => 'Stok produk tidak mencukupi.'
            ], 400);
        }

        $product->kuantiti -= $quantity;
        $product->save();

        return $product;
    }

    public function search(Request $request)
    {
        $id = $request->input('category_id');
        $search = $request->input('search');
//
//        if ($id == null) {
//            $products = Product::where('hidden', false)
//            ->where('name', 'LIKE', "%{$search}%")
//            ->get();
//            return view('product.index', compact('products'));
//        }

        $products = Product::where('hidden', false)
            ->where('category_id', $id)
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

//        dd($id, $search, $products);
        return view('product.index', compact('products'));
    }


}
