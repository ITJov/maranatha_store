<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('hidden', false)->orderBy('created_at', 'desc')->paginate(10);
        return view('category.index-category', compact('categories'));
    }

    public function create()
    {
        return view('category.create-category');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|unique:categories,name|max:255',
            'category_desc' => 'required|string|max:255',
        ]);

        $id = IdGenerator::generate(['table' => 'categories', 'length' => 10, 'prefix' => 'CTG-']);

        $category = Category::create([
            'id' => $id,
            'name' => str($validatedData['category_name']),
            'description' => $validatedData['category_desc'],
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|unique:categories,name|max:255',
            'category_desc' => 'required|string|max:255',
        ]);
//        dd($validatedData);
        $category = Category::find($id);

        $category->update([
            'name' => $validatedData['category_name'],
            'description' => $validatedData['category_desc'],
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function hide($id)
    {
        $category = Category::find($id);
        $category->hidden = true;
        $category->save();

        $product = Product::where('category_id', $id)->get();
        foreach ($product as $p) {
            $p->update([
                'hidden' => true,
            ]);
        }
        return redirect()->route('category.index')->with('success', 'Category has been hidden successfully!');
    }

    public function unhide($id)
    {
        $category = Category::find($id);
        $category->hidden = false;
        $category->save();
        $product = Product::where('category_id', $id)
            ->where('hidden', true)->get();
        foreach ($product as $p) {
            $p->update([
                'hidden' => false,
            ]);
        }
        return redirect()->route('category.index')->with('success', 'Category unhidden successfully!');
    }
    public function HiddenCategory(){
        $categories = Category::where('hidden', true)->paginate(10);
        return view('category.category-hide-ecommerce', compact('categories'));
    }

}
