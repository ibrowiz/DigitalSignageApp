@extends('layouts.operatorapp')
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
            @section('content')
<div class="container">
    <div class="row">
       <ul>
  <li><a href='#'>Users</a></li>
  <li><a href='{{url("/tenantlist")}}'>Media Partners</a></li>
  <li><a href="#contact">Devices</a></li>
  <li><a href="{{url('/device/add') }}">Add Devices</a></li>
  <li><a href="{{url('/devicegroup/index') }}">Device Group</a></li>
  <li><a href='{{url("/devicegroup/add") }}'>Add Device Group</a></li>
</ul>
    </div>
</div>
@endsection
        </div>
    </div>
</div>
@endsection
