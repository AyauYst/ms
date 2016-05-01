<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='groups';
    
    public static  function GetGroups()
    {
        return self::all();
    }
}
