@extends('layouts.contentowner.master')
@section('content')
<!-- Row Starts --><div class = "spacer">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="blog">
									<div class="blog-header">
										<h5 class="blog-title">Edit Device</h5>
									</div>
									<div class="blog-body">
										<form class="form-horizontal" role="form"  method="POST" action="{{ url('/user/updatedevice',array($device->id)) }}">
										{{ csrf_field() }}
										  <div class="form-group">
										    <label for=name class="col-sm-2 control-label">Device Name</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" name = "name" id="name" value="{{$device->device_name}}">
										    </div>
										  </div>

										  <div class="form-group">
										    <label for=name class="col-sm-2 control-label">Serial Number</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" name = "serial_no" id="serial_no" value="{{$device->serial_no}}">
										    </div>
										  </div>

										   <div class="form-group">
										    <label for="" class="col-sm-2 control-label">Firmware ID</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" name = "firmwareId" id="firmwareId" value="{{$device->firmware_id}}">
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="" class="col-sm-2 control-label">UUID</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" name = "uuID" id="uuID" value="{{$device->uu_id}}">
										    </div>
										  </div>
										  	
										  	<div class="form-group">
										    <label for="" class="col-sm-2 control-label">Version</label>
										    <div class="col-sm-7">
										      <input type="text" class="form-control" name="version" id="version" value="{{$device->version}}">
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="" class="col-sm-2 control-label">Description</label>
										    <div class="col-sm-7">
										     <textarea class="form-control" rows="5" name="description" id = "description">{{$device->description}}</textarea>
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