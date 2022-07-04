<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AuthManger extends Authenticatable
{
    use HasFactory;
    protected $table= 'auth_mangers';
    protected $guard = 'mangers';



    protected $fillable = [
        'phone', 'v-code',
    ];

    protected $hidden = [
        'v-code', 
    ];
}
