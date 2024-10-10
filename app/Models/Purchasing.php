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

    protected $fillable = [
        'purchase_id',
        'user_id',
        'date',
        'address',
        'status_order',
        'total_purchase',
        'total_payment'
    ];

    protected $primaryKey = 'purchase_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function purchasing_detail(): HasMany
    {
        return $this->hasMany(Purchasing_Detail::class);
    }

    public function delivery(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }
}
