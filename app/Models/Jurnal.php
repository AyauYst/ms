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
    
    public static function getGroupVisitsPercent($g_id)
    {
        $stud_idx = Group_Student::getStudentsByGroupId($g_id);
        $visits = self::wherein('student_id', $stud_idx)->pluck('visits');

        $v_arr=[];
        foreach ($visits as $val)
            $v_arr[] = $val;

        $les_count = count(Jurnal::wherein('student_id', $stud_idx)->distinct('subject_id')->pluck('subject_id'));

        $delimeter = $les_count*count($stud_idx);
        $visSum = array_sum($v_arr);
        return ($visSum/ ($delimeter==0?1:$delimeter))*5;
    }
    
    public static function getGroupProgressPercent($g_id)
    {
        $stud_idx = Group_Student::getStudentsByGroupId($g_id);
        $cw = self::wherein('student_id', $stud_idx)
            ->where('class_works', '!=', 0)
            ->pluck('class_works');
        $hw = self::wherein('student_id', $stud_idx)
            ->where('home_works', '!=', 0)
            ->pluck('home_works');

        $cw_m = []; foreach ($cw as $val) $cw_m[] = $val;
        $cw_avg = round((array_sum($cw_m))/(count($cw_m)==0?1:count($cw_m)),2);
        $hw_m = []; foreach ($hw as $val) $hw_m[] = $val;
        $hw_avg = round((array_sum($hw_m))/(count($hw_m)==0?1:count($hw_m)),2);
        
        $total = round(($cw_avg+$hw_avg)/2,2);
        return $total;
    }
}
