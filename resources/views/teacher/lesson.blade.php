@extends('layouts.app')

@section('pageTitle', 'Current Lesson')


@section('content')
    <div class="container">
        <h1>Current Lesson</h1>

        <form method="post" action={{url('/teacher/LessonCheck')}} id="LessonCheck">
            {{csrf_field()}}
            {!! Helper::BuildCurrentLessonCheckView( $group_id, $subj_id, $lesNum, old()) !!}
        </form>

    </div>
@stop

