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
}
