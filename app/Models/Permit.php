<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'date_Expired',
        'emp_name',
        'status',
        'emp_Identification',
        'car_number',
        'image',
        'refernce_num',
        
        'ads_id'
    ];

    public function ads(){
        return $this->belongsTo('App\Models\Ads' , 'ads_id');
    }
}
