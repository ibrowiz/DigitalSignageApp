@extends('layouts.contentowner.master')
@section('content')
@include('partials.flash_message')



<div class="spacer">
            
<div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog">
                  <div class="blog-header">
                    <h5 class="blog-title">{{$plan->name}}</h5>
                  </div>
                  <div class="blog-body">
                    <div class="row">
                    <dilv class="col-lg-6 col-md-12 col-sx-12 col-sm-12">
                      <div class="blog">
                        <div class="blog-header">
                          <h5 class="blog-title">Features</h5>
                        </div>
                        <div class="blog-body">
                         <h5>{{$plan->offers}}</h5>
                        </div>
                      </div>
                    </div>

                    <form class="form-horizontal" role="form"  method="POST">
                      {{ csrf_field() }}

                      <div class="form-group{{$errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="" class="col-sm-2 control-label">Number of Devices Needed</label>
                        <div class="col-sm-4">
                          <input type="number" oninput="calculate()" autocomplete="off" class="form-control" name="quantity" id="quantity" required autofocus>
                          @if($errors->has('quantity'))
                          <span class="help-block">
                              <strong>{{ $errors->first('quantity') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <input type="hidden" name="amount" id="amount" value="{{$plan->amount}}">
                      <input type="hidden" name="planId" id="planId" value="{{$plan->id}}">
                      <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Cost Per Device &nbsp;&nbsp;&nbsp;&nbsp;&#8358;{{$plan->amount}}</label>
                      </div>

                       <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total Cost</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="total" id="total" required autofocus>
                        </div>
                      </div>

           
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="submitbtn btn btn-primary" id="submitbtn">Submit</button>
                        </div>
                      </div>

                      <span id='limit' class="hide" style="color:red">Number field Cannot be empty</span>
                  </form>

                    </div>
                  
                  
                  </div>
                </div>
              </div>
            </div>
</div>


  <!-- Spacer starts -->

@endsection
@section('extra-script')
<script type="text/javascript">
jQuery(document).ready(function() {
  $('#total').attr("disabled", "disabled");
});
function calculate() {
          var number = document.getElementById('quantity');
          var amount = document.getElementById('amount'); 
          var total = document.getElementById('total');           
          var myResult = amount.value*number.value;
          total.value = myResult;           
        } 
        
</script>
@endsection
