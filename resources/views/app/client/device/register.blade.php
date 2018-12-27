@extends('layouts.contentowner.master')
@section('content')
@include('partials.flash_message')
<!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Register Device </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <form class="form-horizontal" role="form" method="POST" action="{{ route('client.user.device.update', [$tenant->domain])}}">
                        {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('registrationId') ? ' has-error' : '' }}">
                            <label for="registrationId" class="col-md-4 control-label">Registration ID</label>

                            <div class="col-md-6">
                                <input id="registrationId" type="text" class="form-control" name="registrationId" value="{{ old('registrationId') }}" required autofocus>

                                @if ($errors->has('registrationId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registrationId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                 
              </div>
          </div>
      </div> 
  </div>
<!-- Spacer ends -->
@endsection
