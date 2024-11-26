<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_Cart extends Model
{
    use HasFactory;

    protected $table = 'shop_carts';

    protected $fillable = [
        'id',
        'kuantiti_produk',
        'user_id',
    ];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
