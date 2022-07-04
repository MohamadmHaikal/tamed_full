<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id';
    public $column = 'Addactivitie_id';


    protected $fillable = [
        'name',
        'Addactivitie_id'
    ];

     


    public function relation(){
        return $this->belongsTo('App\Models\AdditionalActivitie' , 'Addactivitie_id');
    }


    public function getColumn($id ='')
    {
        // $TypeInput=[ 
        //    (object) [
        //     'name' => 'select',
        //     'id' => 'select',],
        //     (object) [
        //         'name' => 'text',
        //         'id' => 'text',],
        //         (object) [
        //             'name' => 'radio',
        //             'id' => 'radio',],
        //             (object) [
        //                 'name' => 'checkbox',
        //                 'id' => 'checkbox',],
        //                 (object) [
        //                     'name' => 'on_off',
        //                     'id' => 'on_off'] ];
        $AddActivitie = AdditionalActivitie::all();
        if ($id != "") {
        
            $ValueColumn=Service::where('id',$id)->first();
           
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id
                ]    ,
                (object)   ['columnName' => 'Addactivitie_id',
                'columnType' => 'select',
                'ValueColumn' =>$ValueColumn->relation->name,
                'options' => $AddActivitie
                ] ,
                //  (object)   [ 'columnName' => 'name',
                //             'columnType' => 'text']
                ];
 
        }else{
            return [
                (object)  [ 'columnName' => 'name',
                         'columnType' => 'text'
            ],
            (object)   ['columnName' => 'Addactivitie_id',
            'columnType' => 'hidden',
            'value' => request()->route()->id    
        ],

            // (object)  [ 'columnName' => 'typeColumn',
            // 'columnType' => 'select',
            // 'options' => $TypeInput
            // ] 
        ]; 
        }
    }

    public function getTitleColumn()
    {
        return [
            'id',  
                 'name',
                 'Additional Act',
                 'action',
                ];
    }
}
