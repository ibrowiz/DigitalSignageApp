@extends('layouts.admin.master')
@section('content')
	<div class = "spacer">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog">
                    <div class="blog-header">
                        <h5 class="blog-title">Edit Users</h5>
                            </div>
                                <div class="blog-body">
			                         <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{url('admin/users/update',array($adminuser->id))}}">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{$adminuser->firstname}}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{$adminuser->lastname}}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$adminuser->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         {{-- <div class="panel panel-default">
                         
                                <div class="panel-heading">
                                    Roles({{$roles->count()}})
                                </div>
                         
                            <div class="panel-body">
                         
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    
                                    @foreach($roles as $role)
                         
                                <div class="col-xs-4">
                                    <label class="check">
                                        <input type="checkbox" name="role[]" {{$adminuser->adminRoles->contains('id', $role->id) ? 'checked' :''}}  value="{{$role->id}}"> {{$role->name}}
                                    </label>
                                </div>
                         
                            @endforeach
                         
                                </div>
                         
                            </div>
                         
                        </div> --}}

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