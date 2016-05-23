@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">
        <h1>All Students</h1>
        @foreach($users as $student)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            {{ $student->name }}
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{route('admin.students.edit',$student->id)}}">  <i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="{{ url('admin/students/delete',$student->id)}}">  <i class="fa fa-remove" style="font-size:24px;color:red"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        {{ $student->email }}
                    </div>
                    <div class="panel-body">
                        {{ $student->password }}
                    </div>
                </div>
    @endforeach
@stop