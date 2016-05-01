<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table ='users';

    public static function getTeachers()
    {
        return self::where('role_id','=',3)->get();
    }

    public static function getTeacherById($id)
    {
        return self::where('user_id', '=', $id)->andWhere('role_id','=',3)->firstOrFail();
    }
}
