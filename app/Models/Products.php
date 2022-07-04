<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'value',
        'discount',
        'discount_type',
        'Taxable_amount',
        'tax_rate',
        'tax_amount',
        'invoices_id',
        'total'
    ];
    use HasFactory;
}
