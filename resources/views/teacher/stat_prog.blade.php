@extends('layouts.app')

@section('pageTitle', 'Groups Progress Statistics')


@section('content')
    <div class="container">
        <h1>Groups Progress Statistics</h1>

        {!! Helper::testProgStat() !!}

    </div>
@stop