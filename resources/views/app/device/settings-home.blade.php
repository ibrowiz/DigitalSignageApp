@extends('layouts.contentowner.master')
@section('extra-css')
 <link rel="stylesheet" href="{{URL::to('css/chkbox.css') }}">
 <script src="{{ URL::to('js/chkboxevnt.js') }}"></script>
@endsection
@section('content')
@include('partials.flash_message')
<!-- Spacer starts -->
          <div class="spacer">
            
            <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="blog">
									<div class="blog-header">
										<h5 class="blog-title">Device Settings</h5>
									</div>
					<div class="row">
							<div class="col-lg-12 col-md-12 col-sx-12 col-sm-12">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">Choose Template</h4>
									</div>
									<div class="panel-body">
										<div class="panel-group no-margin" id="accordion">
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="text-primary">
															Standard Templates
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse in">
													<div class="panel-body">
														<form class="form-horizontal" role="form"  method="POST" action="{{ url('user/device/applystandardtemplate')}}">
															{{ csrf_field() }}
															<div class="form-group">
												      		<label for="standardDeviceTemplates" class="col-lg-2 control-label"></label>
												      		<input id="deviceId" name="deviceId" type="text" value="{{$device->id}}">
												      		<div class="col-xs-10 col-sm-5">
												        		<select name = "standardDeviceTemplates" class="form-control" id="">
												        		<option value = " ">Select</option>
												        		@foreach($templates as $template)
										         				<option value="{{$template->id}}">{{$template->name }}</option>
										          					@endforeach
												        	    </select>
												      		</div>
												    		</div>

												    		<div class="form-group">
                            									<div class="col-md-6 col-md-offset-4">
                               				 					<button type="submit" class="btn btn-primary">Apply</button>
                            								</div>
                        									</div>

												    	</form>
													</div>
												</div>
											</div>
											{{--<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="text-primary">
															My Templates
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse">
													<div class="panel-body">
														<form class="form-horizontal" role="form"  method="POST" action="{{url('/user/device/applysavedTemplate')}}">
															{{ csrf_field() }}
															<div class="form-group">
												      		<label for="savedTemplates" class="col-lg-2 control-label"></label>
												      		<input id="deviceId" name="deviceId" type="text" value="{{$device->id}}">
												      		<div class="col-xs-10 col-sm-5">
												        		<select name = "savedtemplate" class="form-control" id="">
												        		  <option value = " ">Select</option>
												        		   @foreach($templates as $template)
										         						 <option value="{{$template->device_id }}">{{$template->template_name }}</option>
										          					@endforeach
												        	    </select>
												      		</div>
												    		</div>
															
															<div class="form-group">
                            									<div class="col-md-6 col-md-offset-4">
                               				 					<button type="submit" class="btn btn-primary">Apply</button>
                            								</div>
                        									</div>

												    	</form>
													</div>
												</div>
											</div>--}}
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="text-primary">
															Current Settings
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="panel-body">
														<div class = "spacer">
										  <div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="blog">
														<div class="blog-header">
														<h5 class="blog-title">Device Settings for &nbsp;{{$device->device_name}}</h5>
														</div>
														<div class="blog-body">

										<form class="form-horizontal" role="form"  method="POST" action="{{ url('/user/device/updatesettings',array($device->id)) }}">
										{{ csrf_field() }}

										
										
										<div class="form-group">
										      <label for="businesscategory" class="col-lg-2 control-label">Business Category</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "businessCategory" class="form-control" id="businessCategory">
										        <option value = " ">Select</option>
										          @foreach($businessCategories as $businessCategory)
										          <option {{ $setting->business_category_id == $businessCategory->id ? "selected":"" }}
										          value="{{$businessCategory->id }}">{{$businessCategory->category_name }}</option>
										          @endforeach
										        </select>
										      </div>
										    </div>


										 <div class="form-group">
										      <label for="businesstype" class="col-lg-2 control-label">Business Type</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "businesstype" class="form-control" id="businesstype">
										        @foreach($businessTypes as $businessType)
										       <option {{ $setting->business_type_id == $businessType->id ? "selected":""}}
										          value="{{$setting->business_type_id }}">{{$businessType->name}}</option>
										           @endforeach
										        </select>
										      </div>
										    </div>
										 

                                           
		                        			<div class="form-group">
												<div>
										 			<label for="" class="col-lg-2 control-label" >Allow public content?</label>
													<input type="checkbox" name="publicContent" {{$device->deviceSetting->public_content_allowed ? 'checked':''}} value="1" id=""/>
														<div class="reveal-if-active">
														<div>
															
		                                              		<h5 class="blog-title">Allowed Content</h5>
		                                              		
														 		@foreach($contentCategories as $contentCategory)
														 		<hr>
															 		<div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                           <div class="col-xs-5 ">
		                                                               <label class="check"><h5>{{$contentCategory->name}}</h5></label>
																		</div>
		                                                            	<div  id="" class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                            	@foreach($contentCategory->contents as $content)
		                                                            	    <div class="col-xs-5">
		                                                                	<label class="check">
		                                                                    	<input type="checkbox" name="content[]" {{$device->contents->contains('id', $content->id) ? 'checked':''}} value="{{$content->id}}"> {{$content->name}} 
		                                                                	</label>
		                                                            		</div>
		                                                            	@endforeach
		                                                           		</div>
		                                                   			</div>
		
		                                                       @endforeach

		                                                  </div>

														<div>
															<hr>
		                                              		<h5 class="blog-title">Flagged Content</h5>
		                                              		<hr>
														 		@foreach($contentCategories as $contentCategory)
															 		<div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                           <div class="col-xs-5 ">
		                                                               <label class="check"><h5>{{$contentCategory->name}}</h5></label>
																		</div>
		                                                            	<div  id="" class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                            	@foreach($contentCategory->flaggedcontents as $flaggedcontent)
		                                                            	<div class="col-xs-5">
		                                                                	<label class="check">
		                                                                    	<input type="checkbox" name="flaggedcontent[]" {{$device->flaggedcontents->contains('id', $flaggedcontent->id) ? 'checked':''}} value="{{$flaggedcontent->id}}"> {{$flaggedcontent->name}}
		                                                                		</label>
		                                                            			</div>
		                                                            		@endforeach
		                                                           		</div>
		                                                   			</div>
		                                                       @endforeach
		                                                  </div>

													</div>
												</div>
											</div>
											
											<!-- <div class="form-group">
												<label for="timezone" class="col-lg-2 control-label">Time zone</label>
												<div class="row">
											
													<div class="col-lg-4">
													  <select  value="{{--{{$device->deviceSetting->time_zone}}--}}">{{--{{$device->deviceSetting->time_zone}}--}}</select>
													</div>
												</div>
											</div> -->
										

										     <div class="form-group">
										      <label for="country" class="col-lg-2 control-label">Country</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "country" class="form-control" id="country">
										        <option value=" ">Select</option>
										        @foreach($countries as $country)
										          <option {{ $device->deviceSetting->country_id == $country->id ? "selected":"" }}
										          value="{{$country->id}}">{{$country->name}}</option>
										        @endforeach
										        </select>
										      </div>
										    </div>

										     <div class="form-group">
										     <label for="state" class="col-lg-2 control-label">State</label>
										     <div class="col-xs-10 col-sm-5">
										        <select name = "state" class="form-control" id="state">
										         @foreach($locations as $location)
										          <option {{ $setting->state_id == $location->id ? "selected":"" }}
										          value="{{$location->id}}">{{$location->state}}</option>
										        @endforeach
										        </select>
										      </div>
										     </div>										    

										     <div class="form-group">
										      <label for="city" class="col-lg-2 control-label">City</label>
										      <div class="col-xs-10 col-sm-5">
										       <input name = "city" value="{{$setting->city}}" class="form-control" id="city">
										      
										      
										      </div>
										    </div>

										    <div class="form-group">
													<div>
										    


										 				<label for=""  class="col-lg-5 control-label" >Do you want to Save these settings as a template?</label>
															<input type="checkbox" name = "save" {{--{{$device->deviceSetting->public_content_allowed ? 'checked':''}}--}} value="1" id=""/>
														<div class="reveal-if-active">
															<div class="form-group">
										    					<label for="templateName" class="col-sm-2 control-label">Template Name</label>
										    						<div class="col-sm-17">
										      							<input type="text" class="form-control" id="" name = "templatename" placeholder="Template Name">
										    						</div>
										 	 				</div>
														</div>
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
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
									</div>

				</div>
          </div>
      </div> 
  </div>
<!-- Spacer ends -->
@endsection
@section('extra-script')
<script type="text/javascript">

	$('#businessCategory').change(function(){
    var businessCategoryID = $(this).val();  
    console.log(businessCategoryID);    
    if(businessCategoryID){
        $.ajax({
           type:"GET",
          url:"{{url('/get-businesstype-list')}}?business_category_id="+businessCategoryID,
           success:function(res){              
            if(res){
                $("#businesstype").empty();
                $("#businesstype").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#businesstype").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#businesstype").empty();
            }
           }
        });
    }else{
        $("#businesstype").empty();
        //$("#city").empty();
    }      
   });

    $('#country').change(function(){
    var countryID = $(this).val();  
     console.log(countryID);   
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('contentowner/location')}}?country_id="+countryID,
           success:function(res){              
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        
    }      
   });
</script>

@endsection
