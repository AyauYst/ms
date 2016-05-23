<?php

namespace App\Http\Controllers\Admin;


use App\Models\Student;
use App\Models\Teacher;
use Helper;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function delete($id)
    {

        Teacher::deleteById($id);
        return view('admin/teachers.index')->with('users', Teacher::getTeachers());

    }

    public function deleteStudent($id)
    {
        Student::deleteById($id);
        return view('admin/students.index')->with('users', Student::getStudents());
    }

    public function data4CreateShedule($GID)
    {
        $VIEW = Helper::WeekDaysTable4CreateShedule($GID);
        return response($VIEW);
    }

    public function ShowShedule($GID)
    {
        $VIEW = Helper::WeekDaysTable4ShowShedule($GID);
        return response($VIEW);
    }
}
