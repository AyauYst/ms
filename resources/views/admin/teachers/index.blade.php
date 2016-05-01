@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">
        <h1>List of teachers</h1>
        @foreach($users as $student)

        @endforeach
    </div>
@stop

