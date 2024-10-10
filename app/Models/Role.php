<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'role_id',
        'role_name',
    ];

    protected $primaryKey = 'role_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user(): HasMany
    {
        return $this->hasMany(User::class, "id_role");
    }
}
