<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserType;

class Activitie extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $primaryKey = 'id';
    public $column = 'section_id';

    protected $fillable = [
        'name',
        'section_id',
        'type_id'
    ];


    // public function relation(){
    //     return $this->belongsTo('App\Models\UserType' , 'type_id');
    // }
    public function relation(){
        return $this->belongsTo('App\Models\Section' , 'section_id');
    }
    public function AdditionalActivitie(){
        return $this->hasMany('App\Models\AdditionalActivitie' , 'activitie_id');
    }

    public function showRelation()
    {
        return 'AdditionalActivitie';
    }
    public function getColumn($id ='')
    {
        $userType = UserType::all();
        $section = Section::all();
        if ($id != "") {
        
            $ValueColumn=Activitie::where('id',$id)->first();
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id ],

                                (object)   ['columnName' => 'section_id',
                                'columnType' => 'select',
                                'ValueColumn' =>$ValueColumn->section,
                                'options' =>    getArrayType()
                                ] ,
                    // (object)   ['columnName' => 'type_id',
                    // 'columnType' => 'select',
                    // 'ValueColumn' =>$ValueColumn->relation->name,
                    // 'options' => $userType
                    // ] ,
            
            ];
 
        }else{
            return [
                        (object)  [ 'columnName' => 'name',
                                'columnType' => 'text'] ,
                        (object)   ['columnName' => 'section_id',
                        'columnType' => 'hidden',
                        'value' => request()->route()->id
                        ] ,
                        // (object)   ['columnName' => 'type_id',
                        // 'columnType' => 'select',
                        // 'options' => $userType
                        // ] ,
                
        ]; }
    }

    public function getTitleColumn()
    {
        return [
                'id',  
                 'name',
                 'Section',
                 'AdditionalActivitie',
                  'action'
                ];
    }
}
