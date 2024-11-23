<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchasing_Detail extends Model
{
    use HasFactory;

    protected $table = 'purchasing_detials';

    protected $fillable = ['id',
    'date', 
    'total_price', 
    'status_order', 
    'purchasing_id'
];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function purchasing()
    {
        return $this->belongsTo(Purchasing::class, 'purchasing_id');
    }
}
