<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealsAuctions extends Model
{
    use HasFactory;

    public function ads(){
        return $this->belongsTo('App\Models\Ads' , 'ads_id');
    }

    public function inv(){
        return $this->belongsTo('App\Models\invoice' , 'invoice_num');
    }
    public function customer(){
        return $this->belongsTo('App\Models\User' , 'from_id');
    }
    public function facility(){
        return $this->belongsTo('App\Models\User' , 'to_id');
    }
}
