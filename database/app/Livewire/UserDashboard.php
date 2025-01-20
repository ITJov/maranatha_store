<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Shop_Cart;
use Illuminate\Support\Facades\Auth;


class UserDashboard extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }

    public function addToCart($productId)
{
if (!Auth::check()) {
    session()->flash('error', 'You must be logged in to add products to the cart.');
    return;
}

Shop_Cart::create([
    'product_id' => $productId,
    'user_id' => Auth::id(), 
    'kuantiti_produk' => 1,
]);

session()->flash('success', 'Product added to cart!');
}
}
