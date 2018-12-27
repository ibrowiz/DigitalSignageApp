@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
<!-- Row Starts -->
<div class = "spacer">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog">
                  <div class="blog-header">
                    <h5 class="blog-title">Edit Bank</h5>
                  </div>
                  <div class="blog-body">
                    <form class="form-horizontal" role="form"  method="POST" action="{{url('admin/bank/update',array($bank->id))}}">
                    {{ csrf_field() }}

                      <div class="form-group">
                          <label for="bankName" class="col-lg-2 control-label">Bank</label>
                          <div class="col-xs-10 col-sm-5">
                            <input type="text" class="form-control" name = "bankName" id="bankName" value="{{$bank->name}}">
                          </div>
                        </div>

                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Account Number</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="accountNumber" id="accountNumber" value = "{{$bank->account_number}}" required>
                        </div>
                      </div>
                        
                         <div class="form-group">
                          <label for="sortcode" class="col-lg-2 control-label">Sort Code</label>
                          <div class="col-xs-10 col-sm-5">
                            <input type="text" class="form-control" name = "sortcode" id="sortcode" value="{{$bank->sort_code}}">
                          </div>
                        </div>
                     
                       
                      
                       <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Update</button>
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