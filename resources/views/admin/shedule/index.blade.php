@extends('layouts.app')

@section('pageTitle', 'Shedule')

@section('content')
    <div class="container">
        <h1>Shedule</h1>

        <form method="post" action="" id="QueryForm">
            <input type="hidden" name="_method" value="" id="METHOD">
            {!! csrf_field() !!}
        </form>

        <div class="form-group">
            <label>Select group</label>
            {!! Helper::select(
                $groups,
                old('group_Id'),
                "Выберите группу",
                ['class' => 'form-control', 'name' => 'group_Id', 'id'=>'group_selector'])
            !!}
            <div>{{ $errors->first('group_Id') }}</div>
        </div>

        <div class="form-group " id="weekDays">
            <div class="panel panel-default">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Mon">Понедельник</a></li>
                    <li><a data-toggle="tab" href="#Tue">Вторник</a></li>
                    <li><a data-toggle="tab" href="#Wed">Среда</a></li>
                    <li><a data-toggle="tab" href="#Thu">Четверг</a></li>
                    <li><a data-toggle="tab" href="#Fri">Пятница</a></li>
                    <li><a data-toggle="tab" href="#Sat">Суббота</a></li>
                    <li><a data-toggle="tab" href="#Sun">Воскресение</a></li>
                </ul>
                <div class="tab-content" id="result"></div>

                <div  class="panel-footer" id="opPanel"></div>
            </div>
        </div>

    </div>

    <script src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('js/SheduleShowScript.js') }}"></script>

@stop


