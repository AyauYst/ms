<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class S_Shedule extends Model
{
    protected $table='s_shedules';

    public function shedules(){return $this->hasMany('App\Models\Shedule');}

    public static function getActualSSID($group_id)
    {
        return self::where('group_id', '=', $group_id)
            ->where('is_actual', '=', true)
            ->value('id');
    }

    public static function getGroupIdBySSID($ssid)
    {
        return self::where('id', '=', $ssid)
            ->value('group_id');
    }

    public static function getSheduleById($id)
    {
        return self::where('id', '=', $id)->get();
    }
}
