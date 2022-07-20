<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjobs extends Model
{
    use HasFactory;
    protected $table = 'subjobs';
    protected $primaryKey = 'id';
    public $column = 'employment_type_id';
    protected $fillable = [
        'name',
        'employment_type_id'
    ];
    public function relation()
    {
        return $this->belongsTo('App\Models\TypeEmployment', 'employment_type_id');
    }
    public function getColumn($id = '')
    {
        $TypeEmployment = TypeEmployment::all();
        if ($id != "") {

            $ValueColumn = Subjobs::where('id', $id)->first();
            return [
                (object)  [
                    'columnName' => 'name',
                    'columnType' => 'text',
                    'ValueColumn' => $ValueColumn->name,
                    'IDColumn' => $ValueColumn->id
                ],
                (object)   [
                    'columnName' => 'employment_type_id',
                    'columnType' => 'select',
                    'ValueColumn' => $ValueColumn->relation->name,
                    'options' => $TypeEmployment
                ],

            ];
        } else {
            return [
                (object)  [
                    'columnName' => 'name',
                    'columnType' => 'text'
                ],
                (object)   [
                    'columnName' => 'employment_type_id',
                    'columnType' => 'hidden',
                    'value' => request()->route()->id
                ],

            ];
        }
    }
    public function getTitleColumn()
    {
        return [
            'id',
            'name',
            'Section',
            'action'
        ];
    }
}
