<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    protected $table = 'user_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function getColumn($id ='')
    {
        
        if ($id != "") {
        
            $ValueColumn=UserType::where('id',$id)->first();
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id
                ]
                //  (object)   [ 'columnName' => 'name',
                //             'columnType' => 'text']
                ];
 
        }else{
            return [
                (object)  [ 'columnName' => 'name',
                         'columnType' => 'text']  ,
                        
         ]; }
    }
    public function activities(){
        return $this->hasMany('App\Models\Activitie' , 'type_id');
    }

    public function getTitleColumn()
    {
        return [
                 'id',  
                 'name',
                 'action'
                ];
    }
}
