@extends('layouts.contentowner.master')
@section('content')
	<div class = "spacer">
       <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="plan">
                <h3 class="plan-title">{{$basic->name}}</h3>
                <p class="plan-price">&#8358;{{$basic->amount}}<span class="plan-unit">per year</span></p>
                <ul class="plan-details">
                    <div class = "spacer">
                    <h4 class="heading">Offers</h4>
                    <div class="panel-body">{{$basic->offers}}</div>
                    </div>
                </ul>
                <a href='{{url("/client/".Auth::user()->client->tenant->domain."/packages/deviceQty/{$basic->id}")}}' class = "btn btn-info btn-lg btn-block choose-plan">Choose Plan</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="plan">
                <h3 class="plan-title">{{$standard->name}}</h3>
                <p class="plan-price">&#8358;{{$standard->amount}}<span class="plan-unit">per year</span></p>
                <ul class="plan-details">
                   <div class = "spacer">
                    <h4 class="heading">Offers</h4>
                    <div class="panel-body">{{$standard->offers}}</div>
                   </div> 
                </ul>
             <a href='{{url("/client/".Auth::user()->client->tenant->domain."/packages/deviceQty/{$standard->id}")}}' class = "btn btn-danger btn-lg btn-block choose-plan">Choose Plan</a>
             
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="plan">
                <h3 class="plan-title">{{$premium->name}}</h3>
                <p class="plan-price">&#8358;{{$premium->amount}}<span class="plan-unit">per year</span></p>
                <ul class="plan-details">
                   <div class = "spacer">
                    <h4 class="heading">Offers</h4>
                    <div class="panel-body">{{$premium->offers}}</div>
                   </div>
                </ul>
                <a href='{{url("/client/".Auth::user()->client->tenant->domain."/packages/deviceQty/{$premium->id}")}}' class = "btn btn-success btn-lg btn-block choose-plan">Choose Plan</a>
                
            </div>
        </div>
    </div>     
    </div> 
@endsection