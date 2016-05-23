<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $table='shedules';

    public function s_shedule(){return $this->belongsTo('App\Models\S_Shedule');}

    public static function getShedule($ssid)
    {
        return self::where('s_shedules_id','=',$ssid)->get();
    }

    public static function getLessonsNumbers($sid, $sub_idx)
    {
        $day = date('N');
        return self::where('s_shedules_id','=',$sid)
            ->where('day_id', '=', $day)
            ->wherein('subject_id', $sub_idx)
            ->pluck('lesson_number');
    }
    
    public static function getSubjectId($sid, $did, $l_n)
    {
        return self::where('s_shedules_id','=',$sid)
            ->where('day_id', '=', $did)
            ->where('lesson_number', '=', $l_n)
            ->value('subject_id');
    }
}
