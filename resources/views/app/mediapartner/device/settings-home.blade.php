@extends('layouts.operator.master')
@section('extra-css')
 <link rel="stylesheet" href="{{URL::to('css/chkbox.css') }}">
 <script src="{{ URL::to('js/chkboxevnt.js') }}"></script>
@endsection
@section('content')
@include('partials.flash_message')
<!-- Spacer starts -->
<<div class="spacer">        
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
			 <h4 class="panel-title">Settings</h4>
			 </div>
				<div class="panel-body">
			       <div class="panel-group no-margin" id="accordion">
					<div class="panel">
					   <div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="text-primary">
								Templates
							</a>
						</h4>
					</div>
				<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
		<form class="form-horizontal" role="form"  method="POST" action="{{ url('mediapartner/'.$tenant->domain.'/device/applytemplate')}}">
		{{ csrf_field() }}
		<div class="form-group">
		 <label for="standardDeviceTemplates" class="col-lg-2 control-label"></label>
		  <input id="deviceId" name="deviceId" type="text" value="{{$device->id}}">
		    <div class="col-xs-10 col-sm-5">
			  <select name = "template_id" class="form-control" id="">
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
			 <h5 class="blog-title">Device Settings for &nbsp;{{$device->name}}</h5>
			  </div>
		  <div class="blog-body">
			
		  <form class="form-horizontal" role="form"  method="POST" action="{{ route('mediapartner.media.device.updatesettings',[$tenant->domain,$device->id])}}">
			{{ csrf_field() }}
			  
    <div class="form-group">
        <label for="contentcategory" class="col-lg-2 control-label">Content Category</label>
          <div class="col-xs-10 col-sm-5">
            <select name = "contentCategory" class="form-control" id="contentCategory">
            <option value = " ">Select</option>
            @foreach($contentCategories as $contentCategory)
            <option {{ $device->deviceSetting->content_category_id == $contentCategory->id ? "selected":"" }} value="{{$contentCategory->id }}">{{$contentCategory->name }}</option>
            @endforeach
            </select>
          </div>
    </div>
    <div class="form-group">
    <label for="contents" class="col-lg-2 control-label">content</label>
      <div class="col-xs-10 col-sm-5">
        <select name = "contents" class="form-control" id="contents">
          <option value = " ">Select</option>
            @foreach($contents as $content)
            <option {{$device->deviceSetting->content_id == $content->id ? "selected":""}}
            value="{{$content->id }}">{{$content->name}}</option>
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
			@foreach($contentCategories as $contentCategory)							 		
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
           <div class="col-xs-5 ">
               <label class="check"><h5>{{$contentCategory->name}}</h5></label>
				</div>
		      <div  id="" class="col-md-12 col-sm-12 col-xs-12">
		     @foreach($contentCategory->contents as $index => $content)
	 <div class="col-xs-6">
	 <label class="check">
    	<input type="checkbox" class="contentcheckbox" name="content[{{$index}}]" {{$device->contents->contains('id', $content->id) ? 'checked':''}} value="{{$content->id}}">{{$content->name}}
		</label></br>&nbsp;&nbsp;                                          							
		<input type="radio" class="allowed-radio" name="status[{{$index}}]" value="1" @if($device->contents->contains($content->id)) {{ $device->contents->where('id', $content->id)->first()->pivot->status == "1" ? 'checked' : '' }} @endif>Allowed

    	<input type="radio" class="flagged-radio" name="status[{{$index}}]" value="0" @if($device->contents->contains($content->id)) {{ $device->contents->where('id', $content->id)->first()->pivot->status == "0" ? 'checked' : '' }} @endif>Flagged
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
        <option value = " ">Select</option>
         @foreach($locations as $location)
          <option {{ $device->deviceSetting->location_id == $location->id ? "selected":"" }}
          value="{{$location->id}}">{{$location->state}}</option>
        @endforeach
        </select>
      </div>
     </div>										    

     <div class="form-group">
      <label for="city" class="col-lg-2 control-label">City</label>
      <div class="col-xs-10 col-sm-5">
      <input name = "city" value="{{$device->deviceSetting->city}}" class="form-control" id="city">
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
    $('.allowed-radio, .flagged-radio').on('change', function() {
    	$(this).prevAll('.check').children('.contentcheckbox').prop("checked", true);
    });

    $('.contentcheckbox').on('change', function(e) {
    	var isChecked = e.target.checked;
    	if (isChecked == true) {
    		$(this).parent().siblings('.allowed-radio').prop("checked", true);
    	} else {
    		$(this).parent().siblings('.allowed-radio').prop("checked", false);
    		$(this).parent().siblings('.flagged-radio').prop("checked", false);
    	}
    });

	$('#contentCategory').change(function(){
    var contentCategoryID = $(this).val();  
    console.log(contentCategoryID);    
    if(contentCategoryID){
        $.ajax({
           type:"GET",
          url:"{{url('/getContent')}}?content_category_id="+contentCategoryID,
           success:function(res){              
            if(res){
                $("#contents").empty();
                $("#contents").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#contents").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#contents").empty();
            }
           }
        });
    }else{
        $("#contents").empty();
        //$("#city").empty();
    }      
   });

   $('#country').change(function(){
    var countryID = $(this).val();  
     console.log(countryID);   
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('locations')}}?country_id="+countryID,
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

