<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
    ];



    public function showRelation()
    {
        return 'Activitie';
    }
    public function getColumn($id ='')
    {
        if ($id != "") {
        
            $ValueColumn=Section::where('id',$id)->first();
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id ]];
 
        }else{
            return [
                        (object)  [ 'columnName' => 'name',
                                'columnType' => 'text'] ,
                                (object)  [ 'columnName' => 'image',
                                'columnType' => 'file'] 
                            ]; }
    }

    public function getTitleColumn()
    {
        return [
                'id',  
                 'name',
                 'Activitie',
                  'action'
                ];
    }
}
