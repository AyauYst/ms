@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">
        <h1>Students</h1>
        @foreach($users as $student)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            {{ $student->name }}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $student->email }}
                </div>
            </div>
        @endforeach

@stop

