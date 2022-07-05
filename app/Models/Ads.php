<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'reference_number',
        'type',
        'title',
        'description',
        'BriefDescription',
       'city_id',
       'neighborhood',
       'price',
       'pricestatus',
       'onMap',
       'lng',
       'lat',
       'deadline',
       'startdate',
       'seenCount',
       'QuotesCount',
       'infoArray',
       'application_conditions',
       'user_id',
       'status',
       'activitie_id',
       'activitie_Add_id',
    ];

    public function activity(){
        return $this->belongsTo('App\Models\Activitie' , 'activitie_id');
    }
    public function ADDactivity(){
        return $this->belongsTo('App\Models\AdditionalActivitie' , 'activitie_Add_id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City' , 'city_id');
    }
    public function Neighborhood(){
        return $this->belongsTo('App\Models\Neighborhood' , 'neighborhood_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function File(){
        return $this->hasMany('App\Models\File' , 'FK');
    }

}
