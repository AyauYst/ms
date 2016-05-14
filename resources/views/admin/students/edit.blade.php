@extends('layouts.app')

@section('pageTitle', 'Students')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit student</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="{{route('admin.students.update', $student->id)}}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>FIO</label>
                                    <input type="text" class="form-control" name="name" value="{{$student->name}}">
                                    <div>{{ $errors->first('name')}}</div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{$student->email}}">
                                    <div>{{ $errors->first('email') }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="{{$student->password}}">
                                    <div>{{ $errors->first('password') }}</div>
                                </div>
                                <!--  <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="con_password">
                                    <div>{{ $errors->first('password') }}</div>
                                </div>
                                -->

                                <div class="form-group">
                                    <label>Select group</label>
                                    {!! Helper::select($group, $student->group_id, "Выберите группу", ['class' => 'form-control', 'name' => 'group_id']) !!}
                                    <div>{{ $errors->first('group_id') }}</div>
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