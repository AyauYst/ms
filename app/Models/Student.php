<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table ='users';

    public static function getStudents()
    {
        return self::where('role_id','=',2)->get();
    }

    public static function getStudentById($id)
    {
        return self::where('id', '=', $id)->Where('role_id','=',2)->firstOrFail();
      
    }

    public static function getStudentsByGroupId($group_id)
    {
        $students_id_arr[] = Group_Student::getStudentsByGroupId($group_id);
        return self::whereIn('id', $students_id_arr)->value('name');
    }
}
