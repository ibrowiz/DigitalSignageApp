@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
<!-- Row Starts --><div class = "spacer">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="blog">
									<div class="blog-header">
										<h5 class="blog-title">Add Business Type</h5>
									</div>
									<div class="blog-body">
										<form class="form-horizontal" role="form"  method="POST" action="{{ url('admin/businesstype/store') }}">
										{{ csrf_field() }}
										  <div class="form-group">
										    <label for="" class="col-sm-2 control-label">Business Name</label>
										    <div class="col-xs-10 col-sm-5">
										      <input type="text" class="form-control" name = "name" id="name">
										    </div>
										  </div>
											
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