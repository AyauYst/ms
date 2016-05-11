@extends('layouts.app')

@section('pageTitle', 'SheduleEditor')

@section('content')
    <div class="container">
        <h1>SheduleEditor</h1>
        <form method="post" action="{{route("admin.shedule.update", $S_ID)}}">
            <input type="hidden" name="_method" value="PUT">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Group</label>
                    {!! $GroupSelector !!}
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
                        {!! $SheduleTable !!}
                    </div>

                    @yield('ERR_')

                </div>
            </div>

            <div class="form-group">
                <div>{{ $errors->first() }}</div>
                <button class="btn btn-success" name="submit" id="sbm">Update Shedule</button>
            </div>
        </form>
    </div>

    <script src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>
@stop

