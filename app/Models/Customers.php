<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_id',
        'customer_id',
        'facility_name',
        'responsible',
        'phone',
        'note',
    ];
}
