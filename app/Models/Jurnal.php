<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table ='jurnal';
    
    public static function issetRowWithTodayCurrentLeson($group_id, $subject_id, $lesson_number)
    {
        $stud_idx = Group_Student::getStudentsByGroupId($group_id);

        $today = new \DateTime('today');
        $rowDate = \DateTime::createFromFormat('Y-m-d H:i:s',
            self::wherein('student_id', $stud_idx)
                ->where('subject_id', '=', $subject_id)
                ->where('lesson_number', '=', $lesson_number)
                ->value('date')
            );

        if(gettype($rowDate) != 'boolean')
        {
            $rowDate->setTime(0,0,0);
            return ($today == $rowDate);
        }
        else return false;
    }
    
}
