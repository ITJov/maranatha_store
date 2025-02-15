<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'kuantiti',
        'category_id',
        'file_photo',
        'hidden',
    ];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function purchasings()
    {
        return $this->belongsToMany(Purchasing::class, 'purchasings_has_product', 'product_id', 'purchasing_id');
    }

    public function carts()
    {
        return $this->hasMany(Shop_Cart::class);
    }

   public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
