<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table='subjects';

    public static  function GetSubjects()
    {
        return self::all();
    }
}
