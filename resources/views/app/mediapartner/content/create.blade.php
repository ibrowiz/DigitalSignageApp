@extends('layouts.operator.master')
@section('extra-css')
 <link rel="stylesheet" href="{{URL::to('css/chkbox.css') }}">
 <script src="{{ URL::to('js/chkboxevnt.js') }}"></script>
@endsection
@section('content')
@include('partials.flash_message')
<!-- Spacer Starts -->
					<div class="spacer">
         
										  <div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="blog">
														<div class="blog-header">
														<h5 class="blog-title">Content Configuration{{-- {{$device->device_name}} --}}</h5>
														</div>
														<div class="blog-body">

										<form class="form-horizontal" role="form"  method="POST" action="{{ url('/mediapartner/submitconfigurecontent')}}">
										{{ csrf_field() }}

										
										
										<div class="form-group">
										      <label for="contentcategory" class="col-lg-2 control-label">Business Category</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "contentCategory" class="form-control" id="contentCategory">
										        <option value = " ">Select</option>
										         @foreach($contentCategories as $contentCategory)
										         <option value="{{$contentCategory->id }}">{{$contentCategory->name }}</option>
										         @endforeach
										        </select>
										      </div>
										    </div>


										 <div class="form-group">
										      <label for="content" class="col-lg-2 control-label">Business Type</label>
										      <div class="col-xs-10 col-sm-5">
										        <select name = "content" class="form-control" id="content">
										        <option value = " ">Select</option>
										      	</select>
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
                            					<div class="col-md-6 col-md-offset-4">
                               				 	<button type="submit" class="btn btn-primary">Proceed</button>
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
@section('extra-script')
<script type="text/javascript">

	$('#contentCategory').change(function(){
    var contentCategoryID = $(this).val();  
    console.log(contentCategoryID);    
    if(contentCategoryID){
        $.ajax({
           type:"GET",
          url:"{{url('/getoperator-content-list')}}?content_category_id="+contentCategoryID,
           success:function(res){              
            if(res){
                $("#content").empty();
                $("#content").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#content").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#content").empty();
            }
           }
        });
    }else{
        $("#content").empty();
        //$("#city").empty();
    }      
   });
</script>
@endsection
