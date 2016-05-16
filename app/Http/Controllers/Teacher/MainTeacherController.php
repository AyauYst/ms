<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainTeacherController extends Controller
{
    public function index()
    {
        /*
         * Если у преподавателя есть активный(идет в настояящее время) урок, то $this->lesson();
         * 1 - по id пользователя вытаскиваем id-шники предметов
         * 2 - проверяем есть ли в расписания всех групп предмет закрепленный за пользователем
         *  2.1 - если да, то проверяем время проведения(по номеру урока в расписании)
         *      2.1.1 - если текущее время попадает в промежуток занятия(between(time_start, time_end)), то $this->lesson();
         */
        return view('home');
    }
    
    public function lesson()
    {
        return view('teacher.lesson');
    }
}
