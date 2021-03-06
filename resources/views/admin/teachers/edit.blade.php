@extends('layouts.app')

@section('pageTitle', 'Teachers')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit teacher</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="{{route('admin.teachers.update', $teacher->id)}}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>FIO</label>
                                    <input type="text" class="form-control" name="name" value="{{$teacher->name}}">
                                    <div>{{ $errors->first('name')}}</div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{$teacher->email}}">
                                    <div>{{ $errors->first('email') }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="{{$teacher->password}}">
                                    <div>{{ $errors->first('password') }}</div>
                                </div>
                                <!--  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="con_password">
                                    <div>{{ $errors->first('password') }}</div>
                                </div>
                                -->

                                <div class="form-group">
                                    <label>Select subject</label>
                                    {!! Helper::select($subjects, $teacher->subject_id, "Выберите предмет", ['class' => 'form-control', 'name' => 'subject_id']) !!}
                                    <div>{{ $errors->first('subject_id') }}</div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" name="submit">Edit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop