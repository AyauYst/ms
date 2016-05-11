<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Subjects_Teacher;
use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/teachers.index')->with('users', Teacher::getTeachers());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/teachers.create')->with('subjects',Subject::GetSubjects());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teacher $teacher, Subjects_Teacher $subjects_Teacher)
    {
      //  dd($request->all());
/*
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|unique',
            'password' => 'required',
            'subject_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin/teachers.create'))
                ->withErrors($validator)
                ->withInput();
        }
*/
        $teacher->name =$request->input('name');
        $teacher->email =$request->input('email');
        $teacher->password =$request->input('password');
        $teacher->role_id=3;
        $subjects_Teacher->user_id;
        $subjects_Teacher->subject_id =$request->input('subject_id');
        $teacher->save();
        $subjects_Teacher->save();

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
        //
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
