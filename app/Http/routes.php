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
    return view('welcome');
});

Route::auth();


Route::group(['middleware'=>'admin'], function()
{
    //заменить
    Route::get('/admin', 'HomeController@index');
    
    Route::resource('/admin/students', 'Admin\StudentsController');
    Route::resource('/admin/teachers', 'Admin\TeachersController');//
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
    Route::get('/teacher', 'HomeController@index');
});


