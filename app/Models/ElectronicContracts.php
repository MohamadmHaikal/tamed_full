<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectronicContracts extends Model
{
    use HasFactory;
    public function UserType()
    {
        return $this->belongsTo('App\Models\UserType', 'type_id');
    }
    public function City()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
