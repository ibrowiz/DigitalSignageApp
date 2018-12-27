@extends('layouts.tenanthomeapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                   <center><h3>Welcome to {{$tenant->name}}</h3></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
