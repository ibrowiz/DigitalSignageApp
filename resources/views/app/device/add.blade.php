@extends('layouts.admin.master')
@section('content')
<!-- Row Starts -->
<div class = "spacer">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="blog">
					<div class="blog-header">
						<h5 class="blog-title">Add Device</h5>
					</div>
					<div class="blog-body">
						<form class="form-horizontal" role="form"  method="POST" action="{{ url('admin/device/save') }}">
						{{ csrf_field() }}


						  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						    <label for=name class="col-sm-2 control-label">Device Name</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name = "name" value="{{ old('name') }}" id="name" required autofocus>
						       @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
						    </div>
						  </div>

						  <div class="form-group{{ $errors->has('serial_no') ? ' has-error' : '' }}">
						    <label for=serial_no class="col-sm-2 control-label">Serial Number</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name = "serial_no" id="serial_no" required autofocus>
						       @if ($errors->has('serial_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
						    </div>
						  </div>

						   <div class="form-group{{ $errors->has('firmwareId') ? ' has-error' : '' }}">
						    <label for="" class="col-sm-2 control-label">Firmware ID</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name = "firmwareId" id="firmwareId" required autofocus>
						       @if($errors->has('firmwareId'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('firmwareId') }}</strong>
                                    </span>
                                @endif
						    </div>
						  </div>

						  <div class="form-group{{ $errors->has('uuID') ? ' has-error' : '' }}">
						    <label for="" class="col-sm-2 control-label">UUID</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name = "uuID" id="uuID" >
						       @if($errors->has('uuID'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('uuID') }}</strong>
                                    </span>
                                @endif
						    </div>
						  </div>
						  	
						<div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
						    <label for="" class="col-sm-2 control-label">Version</label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" name="version" id="version" required autofocus>
						      @if($errors->has('version'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('version') }}</strong>
                                    </span>
                                @endif
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="" class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-7">
						     <textarea class="form-control" rows="5" name="description" id = "description"></textarea>
						    </div>
						  </div>



						   <div class="form-group">
            					<div class="col-md-6 col-md-offset-4">
               				 	<button type="submit" class="btn btn-primary">Save</button>
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