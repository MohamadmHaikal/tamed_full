<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjects extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','author','start_date','end_date'];
}
