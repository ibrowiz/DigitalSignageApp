@extends('layouts.operator.master')

@section('content')
<style type="text/css">
  .steps-form-2 {
      display: table;
      width: 100%;
      position: relative; }
  .steps-form-2 .steps-row-2 {
      display: table-row; }
  .steps-form-2 .steps-row-2:before {
      top: 14px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 100%;
      height: 2px;
      background-color: #7283a7; }
  .steps-form-2 .steps-row-2 .steps-step-2 {
      display: table-cell;
      text-align: center;
      position: relative; }
  .steps-form-2 .steps-row-2 .steps-step-2 p {
      margin-top: 0.5rem; }
  .steps-form-2 .steps-row-2 .steps-step-2 button[disabled] {
      opacity: 1 !important;
      filter: alpha(opacity=100) !important; }
  .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 {
      width: 70px;
      height: 70px;
      border: 2px solid #59698D;
      background-color: white !important;
      color: #59698D !important;
      border-radius: 50%;
      padding: 22px 18px 15px 18px;
      margin-top: -22px; }
  .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2:hover {
      border: 2px solid #4285F4;
      color: #4285F4 !important;
      background-color: white !important; }
  .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 .fa {
      font-size: 1.7rem; }

</style>


<div class="row " style="">
    
	<div class="blog">
	    <div class="blog-header" style="padding-bottom: 30px">
	      <h5 class="blog-title">Create a Schedule</h5>
	    </div>
    	<!-- <div class="col-md-12 col-md-offset-3"> -->
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">      

	      	<!-- Stepper -->
	      	<div class="steps-form-2">
	          	<div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
	              	<div class="steps-step-2">
	                  	<a href="#step-1" type="button" class="btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Schedule Details"><i class="fa fa-folder-open-o" aria-hidden="true"></i></a>
	              	</div>
	              	<div class="steps-step-2 ">
	                  	<a href="#step-2" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Select Layouts"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	              	</div>
	              	<div class="steps-step-2 ">
	                  	<a id="step3" href="#step-3" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect " data-toggle="tooltip" data-placement="top" title="Available Devices"><i class="fa fa-photo" aria-hidden="true"></i></a>
	              	</div>
	          		<div class="steps-step-2 ">
	                  	<a href="#step-4" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect mr-0 text-center " data-toggle="tooltip" data-placement="top" title="Finish"><i class="fa fa-check" aria-hidden="true"></i></a>
	              	</div>
	          	</div>
	      	</div>

    	</div>


    	@if($errors->any())
      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="padding-top: 10px;">  
        	<div class="col-md-6 col-md-offset-3">
          		<div class="alert alert-danger no-margin">
            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            		<ul>
              		@foreach($errors->all() as $error)
                		<li>{{$error}}</li>
              		@endforeach 
            		</ul>
          		</div>             
        	</div>    
      	</div>
    	@endif

    	<!-- First Step -->
    	<form role="form" action='{{url("mediapartner/{$tenant->domain}/schedule/save")}}' method="post" id="scheduleForm">
      		<input type="hidden" name="_token" value="{{ Session::token() }}">
        	<div class="row setup-content-2" id="step-1">
            	<div class="col-md-6 col-md-offset-3">
                	<h3 class="font-weight-bold pl-0 my-4 text-center"><strong>Schedule Details</strong></h3>
                	<div class="form-group md-form">
                    	<label for="title" >Title</label>
                    	<input id="title" name="title" type="text" required="required" class="form-control validate" value="	{{Request::old('title')}}">
                		</div>
                		<div class="form-group md-form">
                    		<label for="start-time">Start Date</label>
                    		<div class='input-group date' id='datetimepicker1'>
                        		<input type='text' name="start_time" class="form-control" required id="start-time" value="{{Request::old('start_time')}}"/>
                        		<span class="input-group-addon">
                            		<span class="glyphicon glyphicon-calendar"></span>
                        		</span>
                    		</div>
                		</div>
                		<div class="form-group md-form mt-3">
		                    <label for="repeat_cycle" data-error="wrong" data-success="right">Repeat Cycle</label>
		                    <select class="form-control" name="repeat_cycle" data-bv-field="repeat_cycle" required id="repeat_cycle">

		                      @foreach ($repeatCycles as $repeatCycle)
		                          <option value="{{$repeatCycle['id']}}">{{$repeatCycle['name']}}</option>
		                      @endforeach

		                    </select>
		                </div>
                		<div class="form-group md-form mt-3">
                    		<label for="expiration_date" data-error="wrong" data-success="right">Expiration Date</label>
		                    <div class='input-group date' id='datetimepicker2'>
		                        <input type='text' class="form-control" required id="expiration_date" name="expiration_date" />
		                        <span class="input-group-addon">
		                            <span class="glyphicon glyphicon-calendar"></span>
		                        </span>
		                    </div>
                		</div>
                		<button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
            	</div>
        	</div>

    		<!-- Second Step -->
        	<div class="row setup-content-2" id="step-2">
            	<div class="col-md-12">
                	<h3 class="font-weight-bold pl-0 my-4 text-center"><strong>Select Layouts</strong></h3>
                	<div class="panel">
                  		<div class="panel-heading">
                    		<input id="search_layout" maxlength="200" type="text" class="form-control" placeholder="Search Layouts Title"  />
                  		</div>

                  		<div class="panel-body ">
	                    	<ul id="search_result" class="list-group no-margin">

	                    	</ul>
                  		</div>
                	</div>

                	<table id="layout-table" class="table table-striped no-margin hide">
                  		<thead>
                    		<tr>
		                      	<th>Layout Title</th>
		                      	<th>Screenshot</th>
		                      	<th>Duration</th>
		                      	<th>Transition</th>
		                      	<th></th>
		                    </tr>
                  		</thead>
                  		<tbody >

                  		</tbody>
                	</table>
                	<button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                	<button id="next_2" class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
            	</div>
        	</div>

	        <!-- Third Step -->
	        <div class="row setup-content-2" id="step-3">
	            <div class="col-md-12">
	                <h3 class="font-weight-bold pl-0 my-4 text-center"><strong>Available Devices</strong></h3>
	                
	                <div class="panel-body">
	                  	<div class="table-responsive">
	                    	<div id="dt_example" class="table-responsive example_alt_pagination clearfix">
	                      		<table id="device-table" class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
			                        <thead>
			                          	<tr>
			                            	<th style="width:3%">
			                              	<!-- <input type="checkbox"> -->
			                            	</th>
				                            <th style="width:12%">Device Title</th>
				                            <th style="width:15%">Location</th>
				                            <th style="width:40%">Available Slot</th>
				                            <th style="width:15%">Provider</th>
				                            <th style="width:15%">Contact Mail</th>
			                          	</tr>
			                        </thead>
			                        <tbody id="device_body">
			                          
			                        </tbody>
	                      		</table>
	                    	</div>
	                  	</div>
	                </div>

                	<button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
                	<button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
            	</div>
        	</div>

	        <!-- Fourth Step -->
	        <div class="row setup-content-2" id="step-4">
	            <div class="col-md-12">
	                <h3 class="font-weight-bold pl-0 my-4 text-center"><strong>Finish</strong></h3>
	                <h2 class="text-center font-weight-bold my-4">Registration completed!</h2>
	                <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
	                <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
	            </div>
	        </div>
    	</form>         
  	</div>
</div>


<script type="text/javascript">
	var token = '{{Session::token()}}';
	var url = '{{route("mediapartner.media.layouts.search",[$tenant->domain])}}';
	var url_devices = '{{route("mediapartner.media.devices.search",[$tenant->domain])}}';


	// Tooltips Initialization
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	});

	$transitions = {!!$transitions!!};

	$transition_string = ``;

	$.each($transitions, function(i, item) {
	console.log(item);
	$transition_string += `<option value="`+item['id']+`" >`+item['name']+`</option>`;
	});

</script>


<script type="text/javascript">
	$(document).ready(function () {
    
	    var navListItems = $('div.setup-panel-2 div a'),
	              allWells = $('.setup-content-2'),
	              allNextBtn = $('.nextBtn-2'),
	              allPrevBtn = $('.prevBtn-2');

      	allWells.hide();

      	navListItems.click(function (e) {
			e.preventDefault();
			var $target = $($(this).attr('href')), $item = $(this);

	      	if (!$item.hasClass('disabled')) {
				navListItems.removeClass('btn-amber').addClass('btn-blue-grey');
				$item.addClass('btn-amber');
				allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
	      	}
      	});
      
		allPrevBtn.click(function(){
      		var curStep = $(this).closest(".setup-content-2"), curStepBtn = curStep.attr("id"),
            	prevStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
      	});

      	allNextBtn.click(function(){

		var form = $("#scheduleForm");

      	var curStep = $(this).closest(".setup-content-2"),
      		curStepBtn = curStep.attr("id"),
          	nextStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          	curInputs = curStep.find("input[type='text'],input[type='url']"),
          	isValid = true;

		$(".form-group").removeClass("has-error");
      	for(var i=0; i< curInputs.length; i++){
			if (!curInputs[i].validity.valid){
              	isValid = false;
              	$(curInputs[i]).closest(".form-group").addClass("has-error");
          	}
        }

      	form.validate({
            rules: {
                "layout[][duration]": "required",
                "number":true
            }
      	});

      	if (isValid && (form.valid() == true))
          	nextStepSteps.removeAttr('disabled').trigger('click');
      	});

  		$('div.setup-panel-2 div a.btn-amber').trigger('click');

		// layouts only for a client/ media partner / user should be availale for use
  		$('#search_layout').on('input',function(e){
    		var query = $('#search_layout').val().trim();
		    if(query.length >=1)
		    {
				$.ajax({
					method: 'POST',
					url: url,
					data: {query: query, _token: token}
				})
				.done(function(msg) {
	        		console.log(JSON.stringify(msg));  
	        		$('#search_result').empty();
	        		$.each(msg.layouts, function(i, item) {
						console.log(item);
						var html = `<li class="list-group-item" id="list_number`+ item.id +`">
						        `
						        + item.title +
						        `
						        <a id="layoutAdd`+ item.id +`" href="#" class="add_layout" data-title="`+ item.title +`"
						        data-screenshot="`+ item.screenshot +`" data-id="`+item.id+`">
						          <span class="pull-right">
						             <i class="fa fa-plus">  </i> Add Layout
						          </span>
						        </a>
						      </li>`;

						$('#search_result').append(html); 
					});    
	      		});
	    	}
		    if(query.length == 0){
				$('#search_result').empty(); 
		    }
		});

  		$count = 0;
		// adding a layout 
		$(document).on('click', ".add_layout", function () {
    		console.log($(this).attr("id"));

		    var adding = `<tr id="layout_`+ $(this).attr("id").replace("layoutAdd", "")+`">
		                    <td>`+ $(this).data("title")+`<input type="hidden" name="layout[`+$count+`][id]" value="`+$(this).data("id")+`"></td>
		                    <td><img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="img-thumbnail" width="50px"/></td>
		                    <td>
		                      <div class="form-group">
		                        <input  type="number" min="1" class="form-control" name="layout[`+$count+`][duration]" placeholder="(Duration in seconds)"  required />
		                      </div>
		                    </td>
		                    <td>
		                      <div class="form-group">
		                        <select class="form-control input-sm" name="layout[`+$count+`][transition]" required>
		                          `+$transition_string+`
		                        </select>
		                      </div>
		                    </td>
		                    <td>
		                      <a href="#" class="trash_out" id="trash_out`+ $(this).attr("id").replace("layoutAdd", "")+`">
		                        <span class="pull-left">
		                           <i class="fa fa-trash-o">  </i>
		                        </span>
		                      </a>

		                    </td>
		                  </tr>`;
		    $count++;
    		$('#layout-table > tbody:last-child').append(adding);

		    $('input[name="layout[][duration]"]').rules("add", {  // <- apply rule to new field
		        required: true
		    });  

			$('#layout-table').removeClass('hide');

 		});


		$(document).on("click", "#next_2", function() {
			console.log("boooooooooooooooooooooooooooooooooo")  
		});

		$(document).on('click', ".trash_out", function () {
			$(this).parents("tr:first").remove();
			if($('#layout-table > tbody').children().length == 0)
		    	$('#layout-table').addClass('hide');
		});

	    $('.ckbox label').on('click', function () {
			$(this).parents('tr').toggleClass('selected');
	    });

	    $('#step3').on('click', function() {
			var layout_list = [];
			console.log("tricky part");

			$.each($('[id^="layout_"]').toArray(), function(i, item) {  // getting all ids starting with layout_ and push to an array
				layout_list.push(item["id"].replace("layout_", ""));
			});

			console.log(layout_list);

  			$.ajax({
			    method: 'POST',
			    url: url_devices,
			    data: { _token: token, layout_list : layout_list}
      		})
      		.done(function(msg) {
        		console.log(JSON.stringify(msg));   

        		$('#device_body').empty();

        		$.each(msg.devices, function(i, item) {
          			console.log(item.device_name);
				  	var htm = `
						<tr class="gradeX">
							<td style="width:3%">
							  <input type="checkbox" name="device[]" value="`+item.id+`">
							</td>
							<td>`+ item['device_name'] +`</td>
							<td>`+item['location']['state']+`</td>
							<td>
							  7:00AM
							</td>
							<td>
							  <span class="label label-info">Telvida</span>
							</td>
							<td>
							  <span class="text-primary">info@telvida.com</span>
							</td>
						</tr>`;

		  			$('#device-table > tbody:last-child').append(htm); 
				});

      		});    
    	});

	});
</script>


@endsection
