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

