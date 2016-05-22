<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects_Teacher extends Model
{
    protected $table ='subjects_teachers';
    public $timestamps = false;

    public static function getTeachers()
    {
        return self::all();
    }

    public static function getSubjectsByTeacherId($t_id)
    {
        return self::where('user_id', '=', $t_id)->pluck('subject_id');
    }
}
