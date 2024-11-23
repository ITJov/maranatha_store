<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

class Purchasing extends Model
{
    use HasFactory;

    protected $table = 'purchasings';

    protected $fillable = ['id', 
    'kuantiti_produk', 
    'date', 
    'user_id', 
    'payment_id'];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details()
    {
        return $this->hasOne(Purchasing_Detail::class, 'purchasing_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchasings_has_product', 'purchasing_id', 'product_id');
    }}
