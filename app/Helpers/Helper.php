<?php

use \App\Models\Subject;
use \App\Models\Shedule;
use \App\Models\S_Shedule;
use \App\Models\Periods;
use \App\Models\Group;

class Helper
{
    public static function select($options = [], $selected = 1, $first_option = '', $attrs = [])
    {
        return view('_helpers.select')
            ->with('options', $options)
            ->with('selected', $selected)
            ->with('first_option',$first_option)
            ->with('attrs', $attrs);
    }

    //Shedule
    public static function getUsefulShedule($GID)
    {
        $UsefulShedule = [];

        $shedule = Shedule::getShedule(S_Shedule::getActualSSID($GID));
        foreach ($shedule as $sh)
        {
            if($sh['day_id']==1)
                $UsefulShedule["Mon"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==2)
                $UsefulShedule["Tue"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==3)
                $UsefulShedule["Wed"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==4)
                $UsefulShedule["Thu"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==5)
                $UsefulShedule["Fri"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==6)
                $UsefulShedule["Sat"][$sh['lesson_number']] = $sh['subject_id'];
            else if($sh['day_id']==7)
                $UsefulShedule["Sun"][$sh['lesson_number']] = $sh['subject_id'];
        }

        if(!isset($UsefulShedule) || count($UsefulShedule)!==7)
        {
            if(!isset($UsefulShedule["Mon"])) for($i=1;$i<7;$i++)$UsefulShedule["Mon"][$i] = "";
            if(!isset($UsefulShedule["Tue"])) for($i=1;$i<7;$i++)$UsefulShedule["Tue"][$i] = "";
            if(!isset($UsefulShedule["Wed"])) for($i=1;$i<7;$i++)$UsefulShedule["Wed"][$i] = "";
            if(!isset($UsefulShedule["Thu"])) for($i=1;$i<7;$i++)$UsefulShedule["Thu"][$i] = "";
            if(!isset($UsefulShedule["Fri"])) for($i=1;$i<7;$i++)$UsefulShedule["Fri"][$i] = "";
            if(!isset($UsefulShedule["Sat"])) for($i=1;$i<7;$i++)$UsefulShedule["Sat"][$i] = "";
            if(!isset($UsefulShedule["Sun"])) for($i=1;$i<7;$i++)$UsefulShedule["Sun"][$i] = "";
        }
        return $UsefulShedule;
    }
    public static function WeekDaysTable4CreateShedule($GID, $ErrorMSG = null)
    {
        $subjects = Subject::GetSubjects();

        $SELECTORS = [];

        for($i=1; $i<7; $i++)
        {
            $SELECTORS['Monday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Mon|".$i]);
            $SELECTORS['Tuesday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Tue|".$i]);
            $SELECTORS['Wednesday'][$i] = self::select($subjects,0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Wed|".$i]);
            $SELECTORS['Thursday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Thu|".$i]);
            $SELECTORS['Friday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Fri|".$i]);
            $SELECTORS['Saturday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Sat|".$i]);
            $SELECTORS['Sunday'][$i] = self::select($subjects, 0, "Выберите предмет",
                ['class' => 'form-control subjSelector', 'name' => "Sun|".$i]);
        }

        return view('_helpers.WeekDaysTable')
            ->with('subjects', $SELECTORS)
            ->with('periods', self::getPeriodsArr($GID))
            ->with('ErrorMSG', $ErrorMSG);
    }
    public static function WeekDaysTable4ShowShedule($GID, $selectMode = false, $ErrorMSG = null)
    {
        $SHEDULE = self::getUsefulShedule($GID);
        $FirstOption = $selectMode?"Выберите предмет":"Нет занятия";
        $disableAttr = $selectMode?[]:['disabled' => ''];

        $subjects = Subject::GetSubjects();
        $SELECTORS = [];

        for($i=1; $i<7; $i++)
        {
            $SELECTORS['Monday'][$i] = self::select($subjects, $SHEDULE['Mon'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Mon|".$i],$disableAttr));
            $SELECTORS['Tuesday'][$i] = self::select($subjects, $SHEDULE['Tue'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Tue|".$i],$disableAttr));
            $SELECTORS['Wednesday'][$i] = self::select($subjects, $SHEDULE['Wed'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Wed|".$i],$disableAttr));
            $SELECTORS['Thursday'][$i] = self::select($subjects, $SHEDULE['Thu'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Thu|".$i],$disableAttr));
            $SELECTORS['Friday'][$i] = self::select($subjects, $SHEDULE['Fri'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Fri|".$i],$disableAttr));
            $SELECTORS['Saturday'][$i] = self::select($subjects, $SHEDULE['Sat'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Sat|".$i],$disableAttr));
            $SELECTORS['Sunday'][$i] = self::select($subjects, $SHEDULE['Sun'][$i], $FirstOption,
                array_merge(['class' => 'form-control subjSelector', 'name' => "Sun|".$i],$disableAttr));
        }


        if($selectMode)
            return view('_helpers.WeekDaysTable')
                ->with('subjects', $SELECTORS)
                ->with('periods', self::getPeriodsArr($GID))
                ->with('ErrorMSG', $ErrorMSG);
        return view('_helpers.WeekDaysTable')
            ->with('subjects', $SELECTORS)
            ->with('periods', self::getPeriodsArr($GID))
            ->with('shedule_id', S_Shedule::getActualSSID($GID))
            ->with('ErrorMSG', $ErrorMSG);
    }
    private static function getPeriodsArr($GID)
    {
        $periods = Periods::getPeriods(Group::getStudyForm($GID));
        $PERIODS = [];

        foreach ($periods as $period)
        {
            $Sdate = new DateTime($period['start_time']);
            $Edate = new DateTime($period['end_time']);
            $PERIODS[] = $Sdate->format('H:i:s')." - ".$Edate->format('H:i:s');
        }

        return $PERIODS;
    }


    //Menu
    public static function AdminMenu(){ return view('_helpers.menu.AdminMenu'); }
    public static function StudentMenu(){ return view('_helpers.menu.StudentMenu'); }
    public static function TeacherMenu(){ return view('_helpers.menu.TeacherMenu'); }
    
    
    //Lesson
    public static function BuildCurrentLessonCheckView($group_id, $subj_id)
    {
        //dd(\App\Models\Student::getStudentsByGroupId($group_id));
        return view('_helpers.LessonCheck')->with('students', \App\Models\Student::getStudentsByGroupId($group_id));
    }
}