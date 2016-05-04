@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">
        <h1>Students</h1>
        @foreach($users as $student)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            {{ $student->name }}
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{route('admin/students.edit', $student->id)}}"><i class="fa fa-edit"></i></a>
                            <label>delete
                                <input type="checkbox" name="delete[]" value="{{$student->id}}" form="delete">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $student->email }}
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-md-10">
                {!! $student->links() !!}
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <button class="btn btn-danger" name="submit" form="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="delete">
        {{csrf_field()}}
    </form>
@stop

