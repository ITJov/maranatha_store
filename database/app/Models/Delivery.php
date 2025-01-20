<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deleveries';

    protected $fillable = [
        'delevery_id',
        'purchase_id',
        'track_order'
    ];

    protected $primaryKey = 'delevery_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function puchasing(): BelongsTo
    {
        return $this->belongsTo(Purchasing::class);
    }
}
