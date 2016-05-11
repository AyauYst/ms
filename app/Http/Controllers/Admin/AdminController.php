<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
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
