<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    protected $table='periods';

    public static function getPeriods($study_form_id)
    {
        return self::where('study_form_id','=',$study_form_id)->get();
    }
    
    public static function getPeriodsWhereIn($study_form_id, $arr_idx)
    {
        return self::where('study_form_id','=',$study_form_id)
            ->wherein('lesson_number', $arr_idx)
            ->get();
    }

    public static function getPeriodsByLesNum($study_form_id, $ln)
    {
        //dd($study_form_id, $ln);
        return self::where('study_form_id','=',$study_form_id)
            ->where('lesson_number', '=', $ln)
            ->get();
    }
}
