<?php

use \App\Models\Subject;
use \App\Models\Student;
use \App\Models\Shedule;
use \App\Models\S_Shedule;
use \App\Models\Periods;
use \App\Models\Group;
use \App\Models\Jurnal;
use \App\Models\Subjects_Teacher;
use \App\Models\Group_Student;

class Helper
{
    //controls
    public static function select($options = [], $selected = 1, $first_option = '', $attrs = [])
    {
        return view('_helpers.select')
            ->with('options', $options)
            ->with('selected', $selected)
            ->with('first_option',$first_option)
            ->with('attrs', $attrs);
    }
    public static function table($headers = [], $rowId = [], $content = [], $attr = [], $cellSize = [])
    {
        return view('_helpers.table')
            ->with('headers', $headers)
            ->with('rowId', $rowId)
            ->with('content', $content)
            ->with('attr', $attr)->with('cellSize', $cellSize);
    }
    public static function textInput($name, $attr = [], $value="")
    {
        return view('_helpers.textInput')
            ->with('name',$name)
            ->with('attr', $attr)
            ->with('value', $value);
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
    public static function BuildCurrentLessonCheckView($group_id, $subj_id, $lesNum,  $old = null)
    {
        return view('_helpers.LessonCheck')
            ->with('group_id', $group_id)
            ->with('subject_id', $subj_id)
            
            ->with('groupName', Group::GetGroupNameByID($group_id))
            ->with('subject', Subject::getSubject($subj_id))
            ->with('lesNum', $lesNum)
            ->with('students', Student::getStudentsNamesByGroupId($group_id))
            ->with('students_idx', Student::getStudentsIDXByGroupId($group_id))
            ->with('oldValues', $old);
    }
    public static function MarkSelectorsWithCorrectNames($string_arr, $commonNamePart, $oldValues)
    {
        $SELECTORS = [];
        for($i=0;$i<count($string_arr);$i++)
        {
            $SELECTORS[] = Helper::select(
                [
                    ['id'=>1, 'name'=>'1'],
                    ['id'=>2, 'name'=>'2'],
                    ['id'=>3, 'name'=>'3'],
                    ['id'=>4, 'name'=>'4'],
                    ['id'=>5, 'name'=>'5']
                ],
                isset($oldValues[$string_arr[$i]])?$oldValues[$string_arr[$i]]:null,
                '-',
                ['class'=>"form-control", 'name'=>"$commonNamePart|$string_arr[$i]"]);
        }
        //dd($oldValues, $SELECTORS);
        return $SELECTORS;
    }
    public static function CommentInputsWithCorrectNames($string_arr, $commonNamePart, $attrs, $oldValues)
    {
        $INPUTS = [];
        for($i=0;$i<count($string_arr);$i++)
        {
            $INPUTS[] = Helper::textInput("$commonNamePart|$string_arr[$i]", $attrs,
                isset($oldValues[$string_arr[$i]])?$oldValues[$string_arr[$i]]:"");
        }
        return $INPUTS;
    }
    public static function PresenceRadioBtnGroupS($students, $oldValues)
    {
        $RadioBtnGroupS = [];
        for($i=0;$i<count($students);$i++)
            $RadioBtnGroupS[] = Helper::PRBG($students[$i], isset($oldValues[$students[$i]])?$oldValues[$students[$i]]:null);
        return $RadioBtnGroupS;
    }
    private static function PRBG($string, $old)
    {
        return view('_helpers.PresenceRadBtnGroup')
            ->with('student',$string)
            ->with('old',$old);
    }
    

    public static function TeachersShedule($user_id)
    {
        /*
         * ++список моих предметов
         * ++ищем в расписании групп свои предметы -> запоминием группу, смену, день, номер урока, предмет
         */
        $subj_idx = [];
        //$subj_idx = Subjects_Teacher::getSubjectsByTeacherId($user_id);
        foreach (Subjects_Teacher::getSubjectsByTeacherId($user_id) as $s_id)
            $subj_idx[] = $s_id;

        $groups = Group::GetGroups();

        $heap = ['1'=>[],'2'=>[],'3'=>[],'4'=>[],'5'=>[],'6'=>[],'7'=>[]];
        foreach ($groups as $group)
        {
            $shedule = Shedule::getShedule(S_Shedule::getActualSSID($group->id))
                ->wherein('subject_id', $subj_idx);

            foreach ($shedule as $sh)
            {

                $heap[$sh->day_id]
                [
                Periods::where('study_form_id','=', $group->study_form_id)
                    ->where('lesson_number','=',$sh->lesson_number)->value('id')-1
                ]
                    = view('_helpers.teachersSheduleCell')
                    ->with('groupName',$group->name)
                    ->with('subject',Subject::getSubject($sh->subject_id));

                /*
                switch ($sh->day_id)
                {
                    case 1:
                    {
                        $heap['mon']
                        [
                            Periods::where('study_form_id','=', $group->study_form_id)
                                ->where('lesson_number','=',$sh->lesson_number)->value('id')-1
                        ]
                            = view('_helpers.teachersSheduleCell')
                                ->with('groupName',$group->name)
                                ->with('subject',Subject::getSubject($sh->subject_id));
                        break;
                    }
                    case 2:
                    {
                        $heap['thu']
                        [
                        Periods::where('study_form_id','=', $group->study_form_id)
                            ->where('lesson_number','=',$sh->lesson_number)->value('id')-1
                        ]
                            = view('_helpers.teachersSheduleCell')
                            ->with('groupName',$group->name)
                            ->with('subject',Subject::getSubject($sh->subject_id));
                        break;
                    }
                }
                */
                /*echo $sh->day_id." "
                    .$sh->lesson_number
                    ." ".$group->name
                    ."(".$group->study_form_id
                    .") ".Subject::getSubject($sh->subject_id)
                    .'<br>';*/
            }
        }

        $periods = [];
        foreach (Periods::all() as $period)
        {
            $periodStr = date_format(new DateTime($period->start_time), 'H:i')." - ".
                date_format(new DateTime($period->end_time), 'H:i');
            $periods[] = $periodStr;
        }
        $TBL = self::table(
            ['№','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
            $periods,
            [
                ['repeat'=>false, 'column_cont'=>$heap[1]],
                ['repeat'=>false, 'column_cont'=>$heap[2]],
                ['repeat'=>false, 'column_cont'=>$heap[3]],
                ['repeat'=>false, 'column_cont'=>$heap[4]],
                ['repeat'=>false, 'column_cont'=>$heap[5]],
                ['repeat'=>false, 'column_cont'=>$heap[6]],
                ['repeat'=>false, 'column_cont'=>$heap[7]]
            ],
            ['class'=>"table table-bordered"],[120,60]);

        //dd($heap);
        return $TBL;
    }
    
    
    
    public static function testVisStat()
    {
        $statData = [];
        foreach (Group::GetGroups() as $group)
        {
            $visPC = Jurnal::getGroupVisitsPercent($group->id);
            $statData[] = 
            [
                "$group->name",  $visPC//abs(rand(0,5)+(1/rand(1,5))-(1/rand(1,5)))
            ];
        }
        
        return view('_helpers.testStat')
            ->with('statData', $statData);
    }
    
    public static function testProgStat()
    {
        $statData = [];
        foreach (Group::GetGroups() as $group)
        {
            $progPC = Jurnal::getGroupProgressPercent($group->id);
            $statData[] =
                [
                    "$group->name",  $progPC//abs(rand(0,5)+(1/rand(1,5))-(1/rand(1,5)))
                ];
        }

        return view('_helpers.testStat')
            ->with('statData', $statData);
    }
}