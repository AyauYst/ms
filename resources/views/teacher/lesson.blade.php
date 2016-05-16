@extends('layouts.app')

@section('pageTitle', 'Current Lesson')


@section('content')
    <div class="container">
        <h1>Current Lesson</h1>

        {!! Helper::BuildCurrentLessonCheckView(1, null) !!}
        <div class="panel panel-default">
            <div class="panel-heading">GroupName, Subject</div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="LessonTheme">Enter Lesson Theme:</label>
                        <input type="text" class="form-control" id="LessonTheme" name="LessonTheme" value="{{old('LessonTheme')}}" placeholder="Enter Lesson Theme">
                        <div>{{ $errors->first('LessonTheme')}}</div>
                    </div>
                </div>
            </div>

            <table class="table">
                SomeTableData
            </table>

            <div class="panel-footer">Footer</div>
        </div>

    </div>
@stop

