<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id'
    ];
    public function relation()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
    public function getColumn($id = '')
    {
        $City = City::all();
        if ($id != "") {

            $ValueColumn = Neighborhood::where('id', $id)->first();
            return [
                (object)  [
                    'columnName' => 'name',
                    'columnType' => 'text',
                    'ValueColumn' => $ValueColumn->name,
                    'IDColumn' => $ValueColumn->id
                ],
                (object)   [
                    'columnName' => 'city_id',
                    'columnType' => 'select',
                    'ValueColumn' => $ValueColumn->relation->name,
                    'options' => $City
                ],

            ];
        } else {
            return [
                (object)  [
                    'columnName' => 'name',
                    'columnType' => 'text'
                ],
                (object)   [
                    'columnName' => 'city_id',
                    'columnType' => 'select',
                    'options' => $City
                ],

            ];
        }
    }

    public function getTitleColumn()
    {
        return [
            'id',
            'name',
            'City',
            'action'
        ];
    }
}
