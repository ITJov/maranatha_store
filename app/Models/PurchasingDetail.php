<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingDetail extends Model
{
    use HasFactory;

    protected $table = 'purchasings_detail'; 
    protected $fillable = ['date', 'total_price', 'status_order', 'purchasing_id'];

    public function purchasing()
    {
        return $this->belongsTo(Purchasing::class, 'purchasing_id', 'id');
    }
}
