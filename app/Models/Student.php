<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';

    public static function getStudents()
    {
        return self::where('role_id', '=', 2)->get();
    }

    public static function getStudentById($id)
    {
        return self::where('id', '=', $id)->Where('role_id', '=', 2)->firstOrFail();

    }
    
    public static function getStudentsNamesByGroupId($group_id)
    {
        $students = Group_Student::getStudentsByGroupId($group_id);
        return self::whereIn('id', $students)->pluck('name');
    }

    public static function getStudentsIDXByGroupId($group_id)
    {
        $students = Group_Student::getStudentsByGroupId($group_id);
        return self::whereIn('id', $students)->pluck('id');

        public
        function deleteById($id)
        {
            return self::destroy($id);
        }
    }
}
