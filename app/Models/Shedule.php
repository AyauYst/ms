<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $table='shedules';

    public function s_shedule(){return $this->belongsTo('App\Models\S_Shedule');}

    public static function getAllGroupShedules($group_id)
    {
        
    }

    public static function getShedule($ssid)
    {
        return self::where('s_shedules_id','=',$ssid)->get();
    }
}
