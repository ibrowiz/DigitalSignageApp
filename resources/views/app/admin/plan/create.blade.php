@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
<!-- Row Starts -->
<div class = "spacer">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="blog">
				<div class="blog-header">
					<h5 class="blog-title">Add Plan</h5>
				</div>
				<div class="blog-body">
				<form class="form-horizontal" role="form"  method="POST" action="{{ url('admin/plan/store')}}">
					{{ csrf_field() }}

					  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					      <label for="name" class="col-lg-2 control-label">Name</label>
					      <div class="col-xs-10 col-sm-5">
					        <input type="text" class="form-control" name = "name" id="name" required autofocus>
					        @if($errors->has('name'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
					      </div>
					    </div>

					    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
					      <label for="amount" class="col-lg-2 control-label">Amount</label>
					      <div class="col-xs-10 col-sm-5">
					        <input type="number" class="form-control" name = "amount" id="amount" required autofocus>
					        @if($errors->has('amount'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
					      </div>
					    </div>

					  <div class="form-group{{ $errors->has('offers') ? ' has-error' : '' }}">
                            <label for="address" class="col-lg-2 control-label">Offers</label>

                            <div class="col-xs-10 col-sm-5">
                                <textarea class="form-control" rows="5" name="offers" id = "offers"></textarea>
                                  @if ($errors->has('offers'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('offers') }}</strong>
                                   </span>
                                  @endif
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