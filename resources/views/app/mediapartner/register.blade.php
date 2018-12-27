@extends('layouts.app')
@section('content')
<div class="container">
@include('partials.flash_message')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Partner</div>
                <div class="panel-body">
                <h5 class="panel-heading">Personal Information</h5>
                <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('mediapartner.register.store') }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        {{ csrf_field() }}
                        

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label for="firstname" class="col-md-4 control-label">First Name</label>
                                        <div class="col-md-6">
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                        
                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                        
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                        <div class="col-md-6">
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('name') }}" required autofocus>
                        
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-4 control-label">phone</label>
                          
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                          
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                        
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
                        
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                   <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <hr>
                                <p>Fill the section below only if there is someone else in your organisation meant to be the Manager of this account</p>
                                <hr>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-4 control-label">I am not the Manager of this account</label>
                                    <div class="col-md-6">
                                     <input type="checkbox" name="manager"  id="checkbox"/>  
                                    </div>
                                </div>

                              <div class="form-group{{ $errors->has('mgr_firstname') ? ' has-error' : '' }}">
                                    <label for="mgr_firstname" class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">
                                        <input id="mgr_firstname" type="text" class="form-control" name="mgr_firstname" value="{{ old('mgr_firstname') }}"  autofocus>
                    
                                        @if ($errors->has('mgr_firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mgr_firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('mgr_lastname') ? ' has-error' : '' }}">
                                    <label for="mgr_lastname" class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">
                                        <input id="mgr_lastname" type="text" class="form-control" name="mgr_lastname" value="{{ old('mgr_lastname') }}" autofocus>
                    
                                        @if ($errors->has('mgr_lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mgr_lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                               <div class="form-group{{ $errors->has('mgr_email') ? ' has-error' : '' }}">
                                  <label for="mgr_email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="mgr_email" type="email" class="form-control" name="mgr_email"  value="{{ old('mgr_email') }}">
                        
                                        @if ($errors->has('mgr_email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mgr_email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                             
                        
                            <h5 class="panel-heading">Legal Documents</h5>
                            <hr>

                         <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Upload 1</label>
                            <div class="col-xs-10 col-sm-5">
                                <input id="file1" type="file" class="form-control" name="image1">
                            </div>
                         </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Upload 2</label>
                            <div class="col-xs-10 col-sm-5">
                                <input id="fil2" type="file" class="form-control" name="image2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Upload 3</label>
                            <div class="col-xs-10 col-sm-5">
                                <input id="file3" type="file" class="form-control" name="image3">
                            </div>
                        </div>

                        <h5 class="panel-heading">Company Information</h5>
                        <hr>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group{{ $errors->has('domain') ? ' has-error' : '' }}">
                            <label for="domain" class="col-md-4 control-label">Domain</label>

                            <div class="col-md-6">
                                <input id="domain" type="text" class="form-control" name="domain" value="{{ old('domain') }}" required autofocus>

                                @if ($errors->has('domain'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domain') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       {{--  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                           <label for="phone" class="col-md-4 control-label">phone</label>
                       
                           <div class="col-md-6">
                               <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                       
                               @if ($errors->has('phone'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('phone') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div> --}}
                           

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="address" id = "address"></textarea>
                                  @if ($errors->has('address'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                   </span>
                                  @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country</label>
                               <div class="col-md-6">
                                   <select name = "country" class="form-control" id="country">
                                       <option value=" ">Select</option>
                                        @foreach($countries as $country)
                                          <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach 
                                  </select>
                             </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State</label>
                              <div class="col-md-6">
                                  <select name = "state" class="form-control" id="state">
                                  </select>
                              </div>
                        </div>
                            

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-script')
<script type="text/javascript">

jQuery(document).ready(function() {
    
  $('#mgr_email').attr("disabled", "disabled");
  $('#mgr_lastname').attr("disabled", "disabled");
  $('#mgr_firstname').attr("disabled", "disabled");
  $('#mgr_password').attr("disabled", "disabled");
  $('#mgr_password-confirm').attr("disabled", "disabled");
});

 $('body').on('change', '#checkbox', function(e){
      if(this.checked)
      {
    
          $('#mgr_email').removeAttr('disabled');
          $('#mgr_lastname').removeAttr('disabled');
          $('#mgr_firstname').removeAttr('disabled');
          $('#mgr_password').removeAttr('disabled');
          $('#mgr_password-confirm').removeAttr('disabled');
      }
      else
            { 
                $('#mgr_email').val('');
              $('#mgr_email').attr("disabled", "disabled");
              $('#mgr_lastname').attr("disabled", "disabled");
              $('#mgr_firstname').attr("disabled", "disabled");
              $('#mgr_password').attr("disabled", "disabled");
              $('#mgr_password-confirm').attr("disabled", "disabled");
            }
    })



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
