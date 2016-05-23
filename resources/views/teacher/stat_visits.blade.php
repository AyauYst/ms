@extends('layouts.app')

@section('pageTitle', 'Groups Visits Statistics')


@section('content')
    <div class="container">
        <h1>Groups Visits Statistics</h1>

        {!! Helper::testVisStat() !!}

    </div>
@stop