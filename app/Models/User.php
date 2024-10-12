<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden =[
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $primaryKey = 'id';
    public $incrementing = 'false';
    protected $keyType = 'string';

    public function namaRole(){
        return $this -> belongsTo(role::class,'role');
    }
    
}
