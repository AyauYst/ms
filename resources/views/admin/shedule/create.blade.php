@extends('layouts.app')

@section('pageTitle', 'SheduleCreator')

@section('content')
    <div class="container">
        <h1>SheduleCreator</h1>

        <form method="post" action="{{route('admin.shedule.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Select group</label>
                {!! Helper::select(
                    $groups,
                    old('group_id'),
                    "Выберите группу",
                    ['class' => 'form-control', 'name' => 'group_id', 'id'=>'group_selector'])
                !!}
                <div>{{ $errors->first('group_id') }}</div>
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

                    <div class="tab-content" id="result">
                        {!! Helper::WeekDaysTable4CreateShedule(0) !!}}
                    </div>
                </div>
            </div>

            <div class="form-group" id="sbm">
                <button class="btn btn-primary" name="submit">Create Shedule</button>
            </div>

        </form>
    </div>

    <script src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('js/SheduleConstructorScript.js') }}"></script>
@stop

