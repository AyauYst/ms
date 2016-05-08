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

    public static function getStudyForm($group_id)
    {
        return self::where('id','=',$group_id)->value('study_form_id');
    }
}
