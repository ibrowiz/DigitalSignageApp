@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard</div>

                <div class="panel-body">
                  @component('components.who')
                  @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container">
    <div class="row">
       <ul>
  {{--<li><a href='#'>Users</a></li>
  <li><a href='{{url("/tenantlist")}}'>Media Partners</a></li>--}}
  <li><a href="#contact">Devices</a></li>
  <li><a href="{{url('contentowner/device/add') }}">Add Devices</a></li>
  <li><a href="{{url('/devicegroup/index') }}">Device Group</a></li>
  <li><a href='{{url("/devicegroup/add") }}'>Add Device Group</a></li>
</ul>
    </div>
</div>
@endsection
