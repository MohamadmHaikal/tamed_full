<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEmployment extends Model
{
    use HasFactory;
    protected $table = 'type_employments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function getColumn($id ='')
    {
        
        if ($id != "") {
        
            $ValueColumn=TypeEmployment::where('id',$id)->first();
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
                         'columnType' => 'text'
            ]   ]; }
    }
    public function getTitleColumn()
    {
        return [
            'id',  
                 'name'
                ];
    }
}