@extends('layouts.operator.master')
@section('content')
@include('partials.flash_message')

<div class="spacer">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="blog blog-success no-margin">
              <div class="blog-header">
                   <h5 class="blog-title">Confirmation</h5>
              </div>
              <div class="blog-body">

              <div class="row" style="text-align: center">
                <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                  <h2>CONFIRMATION PAGE</h2>
                    <div class="panel-group">
                     <div class="panel panel-default">
                      <div class="panel-heading">WEBPAY</div>
                        <div class="panel-body">
                        <span class="glyphicon-credit-card"></span>
                        <form name="contactform" method="post" action="https://sandbox.interswitchng.com/webpay/pay">
                        {{ csrf_field() }}
                            <h4><span class="glyphicon glyphicon-pushpin"></span>
                                Your Reference: <p>(<span style="color:#F00">{{Session::get('tref')}}</span>)</p><br/>
                                You are paying : <p>(<span
                                        style="color:#F00">&#8358;{{$amount_naira}}</span>)</p>
                            </h4>
                        <fieldset>
                        <legend>Confirm your payment</legend>
                        <input name="product_id" type="hidden" value="{{$pdtid}}">
                        <input name="pay_item_id" type="hidden" value="{{$payitemid}}">
                        <input name="currency" type="hidden" value="566">
                        <input name="amount" type="hidden" value="{{$amount_kobo}}">
                        <input name="txn_ref" type="hidden" value="{{$ref}}">
                        <input name="site_redirect_url" type="hidden" value="{{$callbackpage}}">
                        <fieldset class="form-group">
                            <input type="hidden" class="form-control" value="{{$hashval}}" name="hash"/>
                        </fieldset>
                        <input name="cust_name" type="hidden" value="{{Auth::user()->tenant->domain}}">
                        <input name="cust_id" type="hidden" value="{{Auth::user()->tenant->id}}">
                        
                        <button type="submit" class="btn btn-primary">Pay</button>
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

@endsection
