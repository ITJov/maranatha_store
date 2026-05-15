<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_Cart extends Model
{
    use HasFactory;

    protected $table = 'shop_carts';

    // Kolom yang dapat diisi
    protected $fillable = [
        'id',            
        'product_id',     
        'kuantiti_produk',
        'user_id',
    ];

    protected $primaryKey = 'id'; // Tetap sebagai ID utama
    public $incrementing = true; // Gunakan auto-increment untuk kolom ID
    protected $keyType = 'int';  // ID akan berupa integer

    /**
     * Relasi ke model Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
