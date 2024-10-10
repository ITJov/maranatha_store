<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchasing_Detail extends Model
{
    use HasFactory;

    protected $table = 'purchasing_detials';

    protected $fillable = [
        'detail_id',
        'med_id',
        'purchase_id',
        'qty',
        'price',
        'total_price'
    ];

    protected $primaryKey = 'detail_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function purchasing(): BelongsTo
    {
        return $this->belongsTo(Purchasing::class);
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }

}
