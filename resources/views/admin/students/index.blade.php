@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">
        <h1>Students test</h1>
        @foreach($users as $student)

        @endforeach
    </div>
@stop

