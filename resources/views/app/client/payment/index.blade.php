@extends('layouts.contentowner.master')
@section('content')
@include('partials.flash_message')



<div class="spacer">
            
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog">
                  <div class="blog-header">
                    <h5 class="blog-title">WEB PAY </h5>
                  </div>
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sx-12 col-sm-12">
                <div class="panel">  
                  <div class="panel-body">

                  <center><img src="{{URL::asset('images/webpay.png')}}"></center>
                     <div class="row" style="text-align: center">
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="panel-body">
                        <div class="thumbnail">
                          <div class="caption">
                            <form method="post" action="{{ url('client/'.$tenant->domain.'/payment/confirmation')}}">
                            {{ csrf_field() }}
                                    <fieldset class="form-group">
                                        <label for="formGroupExampleInput">Amount</label>
                                        <input type="text" class="form-control" name="amount" />
                                    </fieldset>
                                    <button type="submit" class="btn btn-info" data-toggle="tooltip">Pay Now >></button>
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


  <!-- Spacer starts -->
{{-- <div class="spacer">            
            

  Row Start
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                Widget starts
                <div class="blog blog-success no-margin">
                  <div class="blog-header">
                
                    <h5 class="blog-title">Bank Payment</h5>
                  </div>
                  <div class="blog-body">
                    Row starts
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                          <div class="">
                            <h4 class="heading">Instructions</h4>
                            <ul>
                              <li><h5>Pay into any of our accounts Via Teller or Transfer to <br>Zenith Bank: Telvida Acct no: 09781234<br>GTBank: Telvida Acct no: 097812378<h5></li>
                              <li><h5>After payment upload a scan of the Pink copy of the Deposit slip or Screen shot of the transaction statement</h5></li>
                              <li><h5>Select the Account into which payment was made</h5></li>
                              <li><h5>Supply the amount paid and your account number</h5></li>
                              <li><h5>Indicate if payment is for self or another person and submit</h5></li>
                            </ul> 
                          </div>
                        </div>
                      </div>
                    Row ends

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/mediapartner/payment/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                         <div class="form-group">
                          <div>
                        


                            <label for=""  class="col-md-2 control-label" >Payment for Another acccount?</label>
                              <input type="checkbox" name = "others"/>
                            <div class="reveal-if-active">
                              
                            <div class="form-group">
                                <label for="contentOwner" class="col-lg-2 control-label">Content Owner</label>
                                <div class="col-xs-10 col-sm-5">
                                  <select name = "userName" class="form-control" id="userName">
                                  <option value = " ">Select</loption>
                                    @foreach($contentOwners as $contentOwner)
                                    <option value="{{$contentOwner->email}}">{{$contentOwner->email}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>

                        <div class="form-group">
                            <label for="amount" class="col-md-2 control-label">Amount Paid</label>

                            <div class="col-xs-10 col-sm-5">
                                <input id="amount" type="text" class="form-control" name="amount">

                            </div>
                        </div>


                        <div class="form-group">
                          <label for="receivingAccount" class="col-md-2 control-label">Receiving Account</label>
                          <div class="col-xs-10 col-sm-5">
                            <select name = "receivingAccount" class="form-control" id="receivingAccount">
                            <option value = " ">Select</option>
                              @foreach($telvidaBanks as $telvidaBank)
                              <option value="{{$telvidaBank->name}}">{{$telvidaBank->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-2 control-label">Upload image</label>

                            <div class="col-xs-10 col-sm-5">
                                <input id="file" type="file" class="form-control" name="image">

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>


                  </div>


                </div>
                Widget ends
              </div>

            </div>
            Row End  

</div>
 --}}<!-- Spacer ends -->

@endsection
