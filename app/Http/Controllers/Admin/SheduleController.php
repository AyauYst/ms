<?php

namespace App\Http\Controllers\Admin;

use \Helper;
use App\Models\Group;
use App\Models\S_Shedule;
use App\Models\Shedule;
use App\Models\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/shedule.index')->with('groups',Group::GetGroups());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($GID = null, $errorMSG = null)
    {
        //$groupSelector = Helper::select(Group::GetGroups(), $GID or 0, "Выберите группу",['class' => 'form-control', 'name' => 'group_id', 'id'=>'group_selector']);
        /*if($GID!=null)
        {
            $groupSelector = Helper::select(Group::GetGroups(), $GID, null,
                ['class' => 'form-control', 'name' => 'group_id', 'id'=>'group_selector']);
            return view('admin/shedule.create')
                ->with('GroupSelector',$groupSelector)
                ->with('SheduleTable',Helper::WeekDaysTable4CreateShedule($GID, $errorMSG));
        }
        else*/
            return view('admin/shedule.create')->with('groups',Group::GetGroups());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, S_Shedule $s_Shedule)
    {
        $nullValCount = 0;
        foreach ($request->all() as $key => $value)
        {
            if($value == "")
                if($key!='_token' && $key!='group_id' && $key!='submit')
                    $nullValCount++;
        }

        if($nullValCount == 42)
            return //self::create($request->all()['group_id'], "Расписание не может быть полностью пустым");
                    redirect(route('admin.shedule.create'))->withErrors("Нельзя создать пустое расписание");
        else
        {
            //dd($request->all());
            /*
             * изменить актуальность старого
             * записать в бд новое
             */

            $ssid = $s_Shedule->getActualSSID($request->all()['group_id']);
            $s_Shedule->where('id', '=', $ssid)->update(['is_actual' => false]);

            $s_Shedule = new S_Shedule();
            $s_Shedule->group_id = $request->all()['group_id'];
            $s_Shedule->is_actual = true;
            $s_Shedule->save();

            foreach ($request->all() as $key => $value)
            {
                $rowData = explode('|', $key);
                if(count($rowData) == 2)
                {
                    $shedule = new Shedule();
                    $shedule->s_shedules_id = $s_Shedule->id;
                    $shedule->day_id = $this->getDayID($rowData[0]);
                    $shedule->lesson_number = $rowData[1];
                    $shedule->subject_id = $value;
                    $shedule->save();
                }
            }
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $errMSG = null)
    {
        $GID = S_Shedule::getGroupIdBySSID($id);
        $groupSelector = \Helper::select(Group::GetGroups(), $GID,"",
            ['class' => 'form-control', 'name' => 'group_id', 'id'=>'group_selector','disabled'=>'']);
        $sheduleTable = \Helper::WeekDaysTable4ShowShedule($GID, true, $errMSG);

        return view('admin/shedule.edit')
            ->with('GroupSelector', $groupSelector)
            ->with('SheduleTable', $sheduleTable)
            ->with('S_ID', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nullValCount = 0;
        foreach ($request->all() as $key => $value)
        {
            if($value == "")
                if($key!='_token' && $key!='group_id' && $key!='submit')
                    $nullValCount++;
        }

        if($nullValCount == 42)
            return self::edit($id, "Расписание не может быть полностью пустым");
                //redirect(route('admin.shedule.edit', $id))->withErrors("Расписание не может быть полностью пустым");
        else
        {
            foreach ($request->all() as $key => $value)
            {
                $rowData = explode('|', $key);
                if(count($rowData) == 2)
                {
                    Shedule::where('s_shedules_id', '=', $id)
                        ->where('day_id', '=', $this->getDayID($rowData[0]))
                        ->where('lesson_number', '=', $rowData[1])
                        ->update(['subject_id' => $value]);
                }
            }

            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, S_Shedule $s_Shedule)
    {
        $s_Shedule->where('id', '=', $id)->update(['is_actual' => false]);
        return redirect('/');
    }


    private function getDayID($ShortDayTitle)
    {
        $ShortDayTitle = strtolower($ShortDayTitle);
        switch ($ShortDayTitle)
        {
            case 'mon': { return 1; }
            case 'tue': { return 2; }
            case 'wed': { return 3; }
            case 'thu': { return 4; }
            case 'fri': { return 5; }
            case 'sat': { return 6; }
            case 'sun': { return 7; }
        }
    }
}
