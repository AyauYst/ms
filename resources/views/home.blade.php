@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{Auth::user()->role_id}}
                    @if(Auth::user()->role_id == 3)
                        <p>Teacher Test Panel</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
