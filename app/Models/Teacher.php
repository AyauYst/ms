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
        return self::where('id', '=', $id)->Where('role_id','=',3)->firstOrFail();
    }
    public static function deleteById($id)
    {
        return self::destroy($id);
    }
}
