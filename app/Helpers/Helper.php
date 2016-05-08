<?php

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
    
    public static function WeekDaysTable4CreateShedule($GID)
    {
        $subjects = \App\Models\Subject::GetSubjects();
        $SELECTOR = self::select($subjects, old('subject_id'), "Выберите предмет",
            ['class' => 'form-control subjSelector', 'name' => 'subject_id']);

        return view('_helpers.WeekDaysTable')
            ->with('subjects', $SELECTOR)
            ->with('periods', self::getPeriodsArr($GID));
    }

    public static function WeekDaysTable4ShowShedule($SHEDULE, $GID)
    {
        $subjects = \App\Models\Subject::GetSubjects();
        $SELECTORS = [];

        for($i=1; $i<7; $i++)
        {
            $SELECTORS['Monday'][$i] = self::select($subjects, $SHEDULE['Mon'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Mon".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Tuesday'][$i] = self::select($subjects, $SHEDULE['Tue'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Tue".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Wednesday'][$i] = self::select($subjects, $SHEDULE['Mon'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Wed".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Thursday'][$i] = self::select($subjects, $SHEDULE['Thu'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Thu".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Friday'][$i] = self::select($subjects, $SHEDULE['Fri'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Fri".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Saturday'][$i] = self::select($subjects, $SHEDULE['Sat'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Sat".$i."_subj_selector", 'disabled' => true]);
            $SELECTORS['Sunday'][$i] = self::select($subjects, $SHEDULE['Sun'][$i], "Нет занятия",
                ['class' => 'form-control subjSelector', 'name' => "Sun".$i."_subj_selector", 'disabled' => true]);


        }

        return view('_helpers.WeekDaysTable')
            ->with('subjects', $SELECTORS)
            ->with('periods', self::getPeriodsArr($GID))
            ->with('shedule_id', \App\Models\S_Shedule::getActualSSID($GID));
    }

    private static function getPeriodsArr($GID)
    {
        $periods = \App\Models\Periods::getPeriods(\App\Models\Group::getStudyForm($GID));
        $PERIODS = [];

        foreach ($periods as $period)
        {
            $Sdate = new DateTime($period['start_time']);
            $Edate = new DateTime($period['end_time']);
            $PERIODS[] = $Sdate->format('H:i:s')." - ".$Edate->format('H:i:s');
        }

        return $PERIODS;
    }
}