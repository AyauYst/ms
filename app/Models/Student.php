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
        return self::where('user_id', '=', $id)->andWhere('role_id','=',2)->firstOrFail();
    }
}