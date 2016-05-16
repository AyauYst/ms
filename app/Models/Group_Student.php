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
    
    
    public static function getStudentsByGroupId($group_id)
    {
        return self::where('group_id', '=', $group_id)->value('student_id');
    }
}
