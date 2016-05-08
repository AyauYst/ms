<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Periods;
use App\Models\S_Shedule;
use App\Models\Shedule;
use App\Models\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function data4CreateShedule($GID)
    {
        $VIEW = \Helper::WeekDaysTable4CreateShedule($GID);
        return response($VIEW);
        //return response() ->json([ 'Periods' => Periods::getPeriods(Group::getStudyForm($GID))]);
    }

    public function ShowShedule($GID)
    {
        $MEGA_ARRAY = [];

        //$ACS = new \A_CharSet();
        $shedule = Shedule::getShedule(S_Shedule::getActualSSID($GID));
        foreach ($shedule as $sh)
        {
            //$subj_name = Subject::getSubject($sh['subject_id']);
            //$subj_name = $ACS->charset_x_win($subj_name);
            //$subj_name = iconv('Windows-1251', 'utf-8', $subj_name);

            if($sh['day_id']==1)
                $MEGA_ARRAY["Mon"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==2)
                $MEGA_ARRAY["Tue"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==3)
                $MEGA_ARRAY["Wed"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==4)
                $MEGA_ARRAY["Thu"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==5)
                $MEGA_ARRAY["Fri"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==6)
                $MEGA_ARRAY["Sat"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==7)
                $MEGA_ARRAY["Sun"][$sh['lesson_number']] = $sh['subject_id'];
        }


        if(!isset($MEGA_ARRAY) || count($MEGA_ARRAY)!==7)
        {
            if(!isset($MEGA_ARRAY["Mon"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Mon"][$i] = "";
            if(!isset($MEGA_ARRAY["Tue"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Tue"][$i] = "";
            if(!isset($MEGA_ARRAY["Wed"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Wed"][$i] = "";
            if(!isset($MEGA_ARRAY["Thu"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Thu"][$i] = "";
            if(!isset($MEGA_ARRAY["Fri"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Fri"][$i] = "";
            if(!isset($MEGA_ARRAY["Sat"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Sat"][$i] = "";
            if(!isset($MEGA_ARRAY["Sun"])) for($i=1;$i<7;$i++)$MEGA_ARRAY["Sun"][$i] = "";
        }

        $VIEW = \Helper::WeekDaysTable4ShowShedule($MEGA_ARRAY, $GID);
        return response($VIEW);
        
        //return response()->json(['Shedule' => $MEGA_ARRAY]);//Shedule::getShedule(S_Shedule::getActualSSID($GID))
    }
}
