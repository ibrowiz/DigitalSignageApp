@extends('layouts.contentowner.master')

@section('content')
<div class="current-stats">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="danger-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class=""></i>
                                        <small class="text-white">Devices</small>
                                        <h3 class="no-margin no-padding">100</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="success-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class=""></i>
                                        <small class="text-white">Locations</small>
                                        <h3 class="no-margin no-padding text-white">500</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="info-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class=""></i>
                                        <small class="text-white">Media Partners</small>
                                        <h3 class="no-margin no-padding">50</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="brown-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class=""></i>
                                        <small class="text-white">Content Owners</small>
                                        <h3 class="no-margin no-padding">5000</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="linkedin-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class=""></i>
                                        <small class="text-white">Total Uptime</small>
                                        <h3 class="no-margin no-padding">800 HRS</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                <div class="twitter-bg center-align-text">
                                    <div class="spacer-xs">
                                        <i class="fa fa-twitter fa-2x"></i>
                                        <small class="text-white">Total Down Time</small>
                                        <h3 class="no-margin no-padding text-white">50 HRS</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
{{-- <div class="container">
    <div class="row">
       <ul>
 
  <li><a href="#contact">Devices</a></li>
  <li><a href="{{url('contentowner/device/add') }}">Add Devices</a></li>
  <li><a href="{{url('/devicegroup/index') }}">Device Group</a></li>
  <li><a href='{{url("/devicegroup/add") }}'>Add Device Group</a></li>
</ul>
    </div>
</div> --}}
@endsection
