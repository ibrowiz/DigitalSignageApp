@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
	<div class = "spacer">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog">
                    <div class="blog-header">
                        <h5 class="blog-title">Edit Profile</h5>
                            </div>
                                <div class="blog-body">
			                         <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{url('admin/profile/update', array($admin->id))}}">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				                            {{ csrf_field() }}
                                            
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-4 control-label">First Name</label>
                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{$admin->firstname or old('firstname') }}" required autofocus>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{$admin->lastname or old('lastname')}}" required autofocus>
                                                </div>
                                            </div>

                                            {{--<div class="form-group">
                                                <label for="email" class="col-md-4 control-label">Email</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{$admin->email or old('email') }}" required autofocus>
                                                </div>
                                            </div>--}}

                                             <div class="">
                                                <label for="" class="col-md-4 control-label">Email: </label>
                                                <div class="col-md-6">
                                                {{$admin->email}}
                                                </div>
                                            </div>
                                            <div class = "spacer"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update profile
                                                    </button>
                                                </div>
                                            </div>
                       
                			          </form>
                                    </div>
                                </div>
                              </div>
                    
                            </div>
                        <!-- Row Ends -->
                                     <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog">
                    <div class="blog-header">
                        <h5 class="blog-title">Edit Password</h5>
                            </div>
                                <div class="blog-body">
                                     <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{url('admin/profile/password/update', array($admin->id))}}">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            {{ csrf_field() }}
                                            
                                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                <label for="old_password" class="col-md-4 control-label">Old Password</label>
                                                <div class="col-md-6">
                                                    <input id="old_password" type="password" class="form-control" name="old_password"  required autofocus>
                                                 @if ($errors->has('old_password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old_password') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">New Password</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
                                                <div class="col-md-6">
                                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                                                 @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update Password
                                                    </button>
                                                </div>
                                            </div>
                       
                                      </form>
                                    </div>
                                </div>
                              </div>
                    
                            </div>

                        </div> 
                @endsection