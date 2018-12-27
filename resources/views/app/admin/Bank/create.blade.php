@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
<!-- Row Starts -->
<div class = "spacer">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="blog">
				<div class="blog-header">
					<h5 class="blog-title">Add Bank</h5>
				</div>
				<div class="blog-body">
				<form class="form-horizontal" role="form"  method="POST" action="{{ url('admin/bank/store')}}">
					{{ csrf_field() }}

					  <div class="form-group{{ $errors->has('bankName') ? ' has-error' : '' }}">
					      <label for="bankName" class="col-lg-2 control-label">Bank</label>
					      <div class="col-xs-10 col-sm-5">
					        <input type="text" class="form-control" name = "bankName" id="bankName" required autofocus>
					        @if($errors->has('bankName'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
					      </div>
					    </div>

					  <div class="form-group{{ $errors->has('accountNumber') ? ' has-error' : '' }}">
					    <label for="" class="col-sm-2 control-label">Account Number</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name="accountNumber" id="accountNumber" maxlength="10" required autofocus>
						      @if($errors->has('accountNumber'))
	                                <span class="help-block">
	                                   <strong>{{ $errors->first('accountNumber') }}</strong>
	                                </span>
	                           @endif
					    </div>
					  </div>

					  <div class="form-group{{ $errors->has('sortcode') ? ' has-error' : '' }}">
					    <label for="" class="col-sm-2 control-label">Sort Code</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" name = "sortcode" id="sortcode" maxlength="9" required autofocus>
					       @if($errors->has('sortcode'))
	                                <span class="help-block">
	                                   <strong>{{ $errors->first('sortcode') }}</strong>
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