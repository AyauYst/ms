@extends('layouts.app')

@section('pageTitle', 'My Shedule')


@section('content')
    <div class="container">
        <h1>My Shedule</h1>

        {!! Helper::TeachersShedule($myId) !!}

    </div>
@stop