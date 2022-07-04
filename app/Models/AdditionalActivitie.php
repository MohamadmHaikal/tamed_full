<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activitie;


class AdditionalActivitie extends Model
{
    use HasFactory;

    protected $table = 'additional_activities';
    protected $primaryKey = 'id';
    public $column = 'activitie_id';


    protected $fillable = [
        'name',
        'activitie_id'
    ];

    public function relation(){
        return $this->belongsTo('App\Models\Activitie' , 'activitie_id');
    }

    public function getColumn($id ='')
    {
        $Activitie = Activitie::all();
        if ($id != "") {
        
            $ValueColumn=AdditionalActivitie::where('id',$id)->first();
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id ],
                    (object)   ['columnName' => 'activitie_id',
                    'columnType' => 'select',
                    'ValueColumn' =>$ValueColumn->relation->name,
                    'options' => $Activitie
                    ] ,
            
            ];
 
        }else{
            return [
                (object)  [ 'columnName' => 'name',
                         'columnType' => 'text'] ,
                (object)   ['columnName' => 'activitie_id',
                'columnType' => 'hidden',
                'value' => request()->route()->id
                ] ,
        
        ]; }
    }

    public function showRelation()
    {
        return 'Service';
    }

    public function getTitleColumn()
    {
        return [
            'id',  
                 'name',
                'Activities' ,
                'Services',
                  'action'
                ];
    }

}
