<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Auth\AuthController;
use App\Models\Group;
use App\Models\Jurnal;
use App\Models\Lessons_Themes;
use App\Models\Periods;
use App\Models\S_Shedule;
use App\Models\Shedule;
use App\Models\Subject;
use App\Models\Subjects_Teacher;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

class MainTeacherController extends Controller
{
    public function index()
    {
        //dd($this->VALIDATION());
        //return $this->VALIDATION();
        $valid = $this->VALIDATION();
        if($valid == false)
        {
            return view('home');
        }
        else
            return $this->VALIDATION();
    }

    //переход на страницу проведения занятия
    public function lesson($groupId, $subjectId)
    {
        //return view('teacher.lesson')->with('group_id',1) ->with('subj_id',10)->with('lesNum',0);//для теста
        $valid = $this->VALIDATION();
        if($valid == false)
        {
            return view('home')
                ->with('msg',"Not one of yours lessons isn't started yet.");
        }
        else
            return $this->VALIDATION();

        /*return $this->VALIDATION();

        if($groupId == 0 && $subjectId==0)
        {
            echo 'params null<br>';
            if($this->VALIDATION())
                return $this->VALIDATION();
        }
        else
        {
            echo 'params not null<br>';
            return view('teacher.lesson')->with('group_id',$groupId) ->with('subj_id',$subjectId);
        }*/
    }

    //занести все в журнал
    public function LessonCheck()
    {
        $validator = Validator::make($_REQUEST, [
            'LessonTheme' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect(url("/teacher/lesson/".$_REQUEST['GRP'].'/'.$_REQUEST['SUBJ']))
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $students = [];
            foreach ($_REQUEST as $key => $value)
            {
                $rowData = explode('|', $key);
                if(count($rowData) == 2)
                    $students[$rowData[1]][$rowData[0]] = $value;
            }

            $les_theme = new Lessons_Themes();
            $les_theme->subject_id = $_REQUEST['SUBJ'];
            $les_theme->theme = $_REQUEST['LessonTheme'];
            $les_theme->save();

            foreach ($students as $key => $data)
            {
                $jurnal = new Jurnal();
                $jurnal->student_id = $key;
                $jurnal->subject_id = $_REQUEST['SUBJ'];

                $jurnal->lesson_theme_id = $les_theme->id;
                $jurnal->lesson_number = $_REQUEST['LesNum'];

                $jurnal->date = \DateTime::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s'));
                $jurnal->visits = $data['Presence'];
                $jurnal->home_works = $data['HW'];
                $jurnal->class_works = $data['CW'];
                $jurnal->comment = $data['comment'];
                $jurnal->save();
            }
            return view('home')
                ->with('msg',"Lesson checked");
        }
    }

    //просмотр собственного расписания
    public function shedule()
    {
        return view('teacher.shedule')
            ->with('myId',$user = Auth::user()->id);
    }

    //статистика посещаемости групп
    public function StatVisGroups()
    {
        return view('teacher.stat_visits');
    }

    //статистика успеваемости групп
    public function StatProgGroups()
    {
        return view('teacher.stat_prog');
    }


    private function VALIDATION()
    {
        $user = Auth::user();
        $groups_idx = Group::GetGroups()->pluck('id');

        foreach ($groups_idx as $g_id)
        {
            $s_id = S_Shedule::getActualSSID($g_id);
            if(S_Shedule::getActualSSID($g_id)!=null)
            {
                $les_nums = Shedule::getLessonsNumbers($s_id, Subjects_Teacher::getSubjectsByTeacherId($user->id));
                if(count($les_nums)!=0)
                {
                    for($i=0;$i<count($les_nums);$i++)
                    {
                        $p = Periods::getPeriodsByLesNum(Group::getStudyForm($g_id), $les_nums[$i]);

                        $s_time = new \DateTime($p[0]->start_time);
                        $e_time = new \DateTime($p[0]->end_time);
                        $now = new \DateTime(date('H:i:s'));

                        $s_t_ar = date_parse_from_format('H:i', date_format($s_time, 'H:i'));
                        $e_t_ar = date_parse_from_format('H:i', date_format($e_time, 'H:i'));
                        $n_t_ar = date_parse_from_format('H:i', date_format($now, 'H:i'));

                        if(
                            (
                                ($s_t_ar['hour']<$n_t_ar['hour']) ||
                                ($s_t_ar['hour']==$n_t_ar['hour'] && $s_t_ar['minute']<=$n_t_ar['minute'])
                            )
                            &&
                            (
                                ($e_t_ar['hour']>$n_t_ar['hour']) ||
                                ($e_t_ar['hour']==$n_t_ar['hour'] && $e_t_ar['minute']>$n_t_ar['minute'])
                            )
                        )
                        {
                            $subj = Shedule::getSubjectId($s_id, date('N'), $les_nums[$i]);

                            /*
                             *  есть ли запись в журнале с текущим номером урока
                             *  то отменить переход(+) или построить вид(*) с данными оттуда
                             */
                            if(Jurnal::issetRowWithTodayCurrentLeson($g_id, $subj, $les_nums[$i]))
                                return view('home')->with('msg', 'This lesson has already been marked.');


                            /*echo "<br>After S_T<br>";
                            print_r($s_t_ar); echo '<br>';
                            print_r($n_t_ar); echo '<br>';
                            print_r($e_t_ar); echo '<br>';
                            echo "Before E_T<br><br>";*/


                            //return $this->lesson($g_id, $subj);
                            return view('teacher.lesson')
                                ->with('group_id',$g_id)
                                ->with('subj_id',$subj)
                                ->with('lesNum',$les_nums[$i]);
                        }
                    }
                }
            }
        }
        return false; //view('home')->with('msg',"Not one of yours lessons isn't started yet.");//return false;
    }
}
