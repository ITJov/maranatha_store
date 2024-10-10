<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $fillable = [
        'med_id',
        'med_name',
        'description',
        'price',
        'med_quantity',
        'exp_date',
        'file_photo',
    ];

    protected $primaryKey = 'med_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function purchasing_detail(): HasMany
    {
        return $this->hasMany(Purchasing_Detail::class);
    }
}
