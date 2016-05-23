<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    if(!Auth::check())
        return view('auth.login');
    else
        return redirect()->back();
});

Route::auth();


Route::group(['middleware'=>'admin'], function()
{
    Route::get('/admin', 'HomeController@index');
    
    Route::resource('/admin/students', 'Admin\StudentsController');
    Route::resource('/admin/teachers', 'Admin\TeachersController');
    Route::get('/admin/teachers/{index}','Admin\AdminController@delete');
    Route::resource('/admin/shedule', 'Admin\SheduleController');
    
    Route::post('admin/shedule4SelectedGroup/{GID}', 'Admin\AdminController@ShowShedule');
    Route::post('admin/shedule/getData4CreateShedule/{GID}', 'Admin\AdminController@data4CreateShedule');
});


Route::group(['middleware'=>'student'], function()
{
    Route::get('/student', 'HomeController@index');
});

Route::group(['middleware'=>'teacher'], function()
{
    Route::get('/teacher', 'Teacher\MainTeacherController@index');
    
    Route::get('/teacher/shedule', 'Teacher\MainTeacherController@shedule');
    Route::get('/teacher/stat_vis_groups', 'Teacher\MainTeacherController@StatVisGroups');
    Route::get('/teacher/stat_prog_groups', 'Teacher\MainTeacherController@StatProgGroups');
    
    Route::get('/teacher/lesson/{groupId}/{subjectId}', 'Teacher\MainTeacherController@lesson');
    Route::post('/teacher/LessonCheck', 'Teacher\MainTeacherController@LessonCheck');
});

