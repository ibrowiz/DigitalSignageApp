@extends('layouts.contentowner.master')
@section('extra-css')
 <link rel="stylesheet" href="{{URL::to('css/chkbox.css') }}">
@endsection
@section('content')
@include('partials.flash_message')
<!-- Row Starts --><div class = "spacer">
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
										          <option value="{{$businessCategory->id }}">{{$businessCategory->category_name }}</option>
										          @endforeach
										        </select>
										      </div>
										    </div>


										 <div class="form-group">
										      <label for="businesstype" class="col-lg-2 control-label">Business Type</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "businesstype" class="form-control" id="businesstype">
										        <option value = "">Select</option>
										         @foreach($businessTypes as $businessType)
										         <option value="{{$businessType->id}}">{{$businessType->name}}</option>
										         @endforeach
										        </select>
										      </div>
										    </div>
										 
										
                                           
		                        			<div class="form-group">
												<div>
										 			<label for="" class="col-lg-2 control-label" >Allow public content</label>
													<input type="checkbox" name="publicContent" {{$device->deviceSetting->public_content_allowed ? 'checked':''}} value="1" id=""/>
														<div class="reveal-if-active">
														<div>
															<hr>
		                                              		<h5 class="blog-title">Allowed Content</h5>
		                                              		<hr>
														 		@foreach($contentCategories as $contentCategory)
															 		<div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                           <div class="col-xs-5 ">
		                                                               <label class="check">{{$contentCategory->name}}</label>
																		</div>
		                                                            	<div  id="" class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                            	@foreach($contentCategory->contents as $content)
		                                                            	<div class="col-xs-2">
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
		                                                               <label class="check">{{$contentCategory->name}}</label>
																		</div>
		                                                            	<div  id="" class="col-md-12 col-sm-12 col-xs-12 form-group">
		                                                            	@foreach($contentCategory->flaggedcontents as $flaggedcontent)
		                                                            	<div class="col-xs-2">
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
											
											<div class="form-group">
												<label for="timezone" class="col-lg-2 control-label">Time zone</label>
												<div class="row">
											
													<div class="col-lg-4">
													  <select  value="{{$device->deviceSetting->time_zone}}">{{$device->deviceSetting->time_zone}}</select>
													</div>
												</div>
											</div>
										

										     <div class="form-group">
										      <label for="country" class="col-lg-2 control-label">Country</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "country" class="form-control" id="country">
										        <option value=" ">Select</option>
										        @foreach($countries as $country)
										          <option value="{{$country->id}}">{{$country->name}}</option>
										        @endforeach
										        </select>
										      </div>
										    </div>

										     <div class="form-group">
										      <label for="state" class="col-lg-2 control-label">State</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "state" class="form-control" id="state">
										        
										        </select>
										      </div>
										    </div>

										     <div class="form-group">
										      <label for="city" class="col-lg-2 control-label">City</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "city" class="form-control" id="city">
										         
										        </select>
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
@section('extra-script')
<script src="{{ URL::to('js/chkboxevnt.js') }}"></script>

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
           url:"{{url('contentowner/get-state-list')}}?country_id="+countryID,
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
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val(); 
    console.log(stateID);    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('contentowner/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>

@endsection