<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_Student extends Model
{
    protected $table='groups_students';
    public $timestamps = false;

    public static  function GetStudents()
    {
        return self::all();
    }
    
}
