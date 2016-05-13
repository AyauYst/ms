@extends('layouts.app')

@section('pageTitle', 'Teachers')

@section('content')
    <div class="container">
        <h1>All Teachers</h1>
        @foreach($users as $teacher)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            {{ $teacher->name }}
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{route('admin.teachers.edit',$teacher->id)}}">  <i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="{{route('admin.teachers.index',$teacher->id)}}">  <i class="fa fa-remove" style="font-size:24px;color:red"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $teacher->email }}
                </div>
                <div class="panel-body">
                    {{ $teacher->password }}
                </div>
            </div>
    @endforeach
@stop