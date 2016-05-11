<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Group_Student;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/students.index')->
        with('users', Student::getStudents());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/students.create')->with('groups',Group::GetGroups());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Student $student, Group_Student $group)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:500',
            'password' => 'required',
            'group_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.students.create'))
                ->withErrors($validator)
                ->withInput();
        }

       // $student->role_id =2;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');

        $student->save();
        $group->group_id = $request->input('group_id');
        $group->save();

        return redirect(route('admin/students.create'));

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
    public function edit($id)
    {
        return view('admin/students.edit')
            ->with('group', Group_Student::GetStudents());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
