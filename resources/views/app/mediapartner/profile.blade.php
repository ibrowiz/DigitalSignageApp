@extends('layouts.operator.master')
@section('content')
@include('partials.flash_message')
	<div class = "spacer">
            
<!-- Row Start -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <!-- Widget starts -->
        <div class="blog blog-info">
            <div class="blog-header">
                <h5 class="blog-title">Profile</h5>
            </div>
            <div class="blog-body">
                <div class="col-lg-12 col-md-12">
                <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{route('mediapartner.media.operator.update', [$tenant->domain,$operator->id])}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="control-label">Email: </label>
                            {{$operator->email}}
                        </div>
                        
                        <div class="form-group">
                            <!-- <label for="firstname" class="col-md-4 control-label">First Name</label> -->
                            <label class="control-label">First Name</label>
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{$operator->first_name or old('firstname') }}" required autofocus>
                        </div>

                         <div class="form-group">
                            <label for="lastname"class="control-label">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{$operator->last_name or old('lastname') }}" required autofocus>
                        </div>


                        <div class="form-group">
                            <p>&nbsp;</p>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Update profile
                                </button>
                        </div>
   
                  </form>
                </div>   
            </div>
        </div>
    </div>
        <!-- Widget ends -->

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <!-- Widget starts -->
                <div class="blog blog-success">
                    <div class="blog-header">
                        <h5 class="blog-title">Password</h5>
                    </div>
                    <div class="blog-body">
                    <div class="col-lg-12 col-md-12">
                    <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{route('mediapartner.media.operatorpassword.update', [$tenant->domain, $operator->id])}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            {{ csrf_field() }}
                            
                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                <label for="old_password" class="control-label">Old Password</label>
                                    <input id="old_password" type="password" class="form-control" name="old_password"  required autofocus>
                                 @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">New Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="control-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                                 @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                      </form> 
                     </div>
                    </div>
                </div>
                <!-- Widget ends -->
            </div>
           </div>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog blog-primary">
                    <div class="blog-header">
                        <h5 class="blog-title">Contact Info</h5>
                        </div>
                            <div class="blog-body">
			                    <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{route('mediapartner.media.tenantinfo.update', [$tenant->domain,$operator->id])}}">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				                            {{ csrf_field() }}
                                            
                                        <div class="form-group">
                                            <label for="phone" class="col-md-4 control-label">Phone</label>
                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{$tenant->tenantProfile->phone or old('phone') }}" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email" class="col-md-4 control-label">Email</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{$tenant->tenantProfile->contact_email or old('email') }}" required autofocus>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label for="address" class="col-md-4 control-label">Address</label>
                                            <div class="col-md-6">
                                            <textarea class="form-control" rows="5" name="address" id = "address">{{$tenant->tenantProfile->address or old('address') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="country" class="col-md-4 control-label">Country</label>
                                          <div class="col-md-6">
                                            <select name = "country" class="form-control" id="country">
                                            <option value=" ">Select</option>
                                            @foreach($countries as $country)
                                              <option {{ $tenant->tenantProfile->country_id == $country->id ? "selected":"" }}
                                              value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                            </select>
                                          </div>
                                        </div>

                                         <div class="form-group">
                                         <label for="state" class="col-md-4 control-label">State</label>
                                         <div class="col-md-6">
                                            <select name = "state" class="form-control" id="state">
                                            <option value = " ">Select</option>
                                             @foreach($locations as $location)
                                              <option {{ $tenant->tenantProfile->location_id == $location->id ? "selected":"" }}
                                              value="{{$location->id}}">{{$location->state}}</option>dd($location->state)
                                            @endforeach
                                            </select>
                                          </div>
                                         </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                       
                			          </form>
                                    </div>
                                </div>
                              </div>
                    
                            </div>
                        <!-- Row Ends -->


            
                        </div> 
                @endsection