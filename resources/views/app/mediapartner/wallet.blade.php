@extends('layouts.operator.master')
@section('content')
@include('partials.flash_message')
<!-- Spacer Starts -->
          <div class="spacer">
            <div class="row"> 
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
            <h4>WALLET</h4>
              </div>
            <div class="pull-right">
              
            <a href='#' class = "btn btn-warning btn-rounded btn-transparent" data-id="{{$wallet->tenant_profile_id}}" data-toggle="modal" data-url="{{url('mediapartner/'.$tenant->domain.'/walletsetting')}}" data-target="#changesettings">Settings</a>

             <a href='#' class = "btn btn-success btn-rounded btn-transparent" data-id="{{$wallet->tenant_profile_id}}" data-toggle="modal" data-url="{{url('mediapartner/'.$tenant->domain.'/wallet/convertbonus/'.$wallet->tenantProfile->tenant->id)}}" data-target="#bonus">Convert Bonus</a>

              {{-- <a href="{{url('mediapartner/'.$tenant->domain.'/wallet/pay')}}" class = "btn btn-info btn-rounded btn-transparent" class = "btn btn-success btn-rounded btn-transparent" data-id="{{$wallet->tenant_profile_id}}" data-toggle="modal" data-url="{{url('operator/convertbonus/'.$wallet->assignable_id)}}" data-target="#bonus">Pay Cash</a> --}}

              <a href="{{url('mediapartner/'.$tenant->domain.'/payment/index')}}" class = "btn btn-info btn-rounded btn-transparent">Make Payment</a>

              <a href='#' class = "btn btn-danger btn-rounded btn-transparent" data-id="{{$wallet->tenantProfile->tenant->id}}" data-toggle="modal" data-url="{{url('mediapartner/'.$tenant->domain.'/wallet/assignpoint/'.$wallet->tenantProfile->tenant->id)}}" data-target="#credit">Buy Points</a>
                
            </div>

          </div>
            <hr class="less-margin">

            <!-- Row starts -->
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="panel-blue">
                  <h4 class="heading">Available Cash</h4>
                  <div class="panel-body"><center><h4><span>&#8358;</span>{{$wallet->cash}}</h4></center></div>
                </div>
              </div>
            
               <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="panel-red">
                  <h4 class="heading">Available Points</h4>
                  <div class="panel-body"><center><h4>{{$wallet->point}} pts</h4></center></div>
                </div>
              </div> 

              <div class="col-lg-4 col-md-4 col-sm-12 col-sx-12">
                <div class="panel-orange">
                  <h4 class="heading">Bonus</h4>
                  <div class="panel-body"><center><h4>{{$wallet->bonus}} pts</h4></center></div>
                </div>
              </div>
            </div>
          </div>

            <!-- Row Starts -->
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="blog">
                  <div class="blog-header">
                    <h5 class="blog-title">Recent Credit Transactions</h5>
                  </div>
                  <div class="blog-body">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Amount</th>
                          <th>Balance</th>
                          <th>Point</th>
                          <th>Point Balance</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                     <tbody>             
                               @if(count($trans) > 0)
                               @foreach($trans as $index => $trans)
                                   <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$trans->amount}}</td>
                                      <td>{{$trans->balance}}</td>
                                      <td>{{$trans->points}}</td>
                                      <td>{{$trans->point_balance}}</td>
                                      <td>{{$trans->type}}</td>  
                                    </tr>
                                  @endforeach
                                @endif
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="blog">
                  <div class="blog-header">
                    <h5 class="blog-title">Recent point Transactions</h5>
                  </div>
                  <div class="blog-body">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Amount</th>
                          <th>Balance</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                     <tbody>             
                             {{-- @if(count($pointLogs) > 0)
                               @foreach($pointLogs as $index => $pointLog)
                                   <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$pointLog->last_added_point}}</td>
                                      <td>{{$pointLog->total_point}}</td>
                                      <td>{{$pointLog->type_of_transaction}}</td>
                                    </tr>
                                  @endforeach
                                @endif   --}}    
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row Ends -->

<!-- Spacer endss -->

<div class="modal fade" id="changesettings">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Wallet Settings</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal" role="form" method="POST" action="">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  {{ csrf_field() }}
                        <div class="form-group">
                          <label for=""  class="col-md-2 control-label">Auto Convert Bonus to Points</label>
                            <div class="col-sm-5">
                              <input type="checkbox"  name = "autobonus" {{$wallet->bonus_flag == 1 ? 'checked':''}} value = 1>
                          </div>
                        </div>

                     <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="submitbtn">Submit</button>
                    </div>
                  </div>

              
          </div>
          <div class="modal-footer">

           <!--  <a href='#' class = "btn btn-success activate-url">Add</a> -->
           <input type="reset" value="reset" class="btn btn-info">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<div class="modal fade" id="bonus">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Convert Bonus</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal" role="form" method="POST" action="">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  {{ csrf_field() }}
                        <div class="form-group">
                          <label for=""  class="col-md-2 control-label">To Points</label>
                            <div class="col-sm-5">
                              <input type="radio"  name = "convertbonus" value = "point">
                          </div>
                        </div>

                   <div class="form-group">
                        <label for=""  class="col-md-2 control-label">To Credits</label>
                            <div class="col-sm-5">
                              <input type="radio"  name = "convertbonus" value = "credit">
                          </div>
                    </div>
                     <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="submitbtn">Submit</button>
                    </div>
                  </div>

              
          </div>
          <div class="modal-footer">

           <!--  <a href='#' class = "btn btn-success activate-url">Add</a> -->
           <input type="reset" value="reset" class="btn btn-info">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<div class="modal fade" id="credit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Buy Points</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal" role="form" method="POST" action="">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="amount">Enter Amount</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name = "amount" 
                        id="amount" oninput="calculate()" autocomplete="off" placeholder="Amount"/>
                    </div>
                  </div>

                   <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="point">Enter Points</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="point" 
                        id="point" placeholder="Point"/>
                    </div>
                  </div>
                <input type="hidden" name="points" id="points">
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="submitbtn btn btn-primary" id="submitbtn">Buy</button>
                    </div>
                  </div>
                <span id='limit' class="hide" style="color:red">You cannot purchase less than 2 points</span>
                <span id='insufficient' class="hide" style="color:red">You have insufficient credit in wallet</span>
          </div>
          <div class="modal-footer">

           <!--  <a href='#' class = "btn btn-success activate-url">Add</a> -->
           <input type="reset" value="reset" class="btn btn-info">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

@endsection
@section('extra-script')
<script type="text/javascript">
jQuery(document).ready(function() {
  $('#point').attr("disabled", "disabled");
});
function calculate() {
            var myBox1 = document.getElementById('amount').value; 
          var amountPerPoint = 1;
          var Point = document.getElementById('point');
          var Points = document.getElementById('points');
          var myResult = (myBox1/amountPerPoint);
          Point.value = myResult.toFixed(0);
          Points.value = myResult.toFixed(0);
  
        } 
    $('body').on('change', '#amount', function(e){
      handleChange();
    })

  function handleChange() {
    
     //console.log(point);
     var point= document.getElementById('points');
     var amount= document.getElementById('amount');
     var amt = parseInt({!! json_encode($wallet->cash) !!});
     //debugger;
     //console.log(amount);
     //console.log(`point : ${point.value}, amount: ${amount.value}`);

    if (point.value < 2){
        $('#limit').removeClass('hide');
        $('#insufficient').addClass('hide');
        $('.submitbtn').attr('disabled', 'disabled');

    }else if (amount.value > amt){
        $('#limit').addClass('hide');
        $('#insufficient').removeClass('hide');
        $('.submitbtn').attr('disabled', 'disabled');

    }else{

        $('#limit').addClass('hide');
        $('#insufficient').addClass('hide');
        $('.submitbtn').removeAttr('disabled');

    }

  }

$('#credit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  console.log(url);
  console.log(id);
  var modal = $(this)
  modal.find('form').attr('action', url)
});

//bonus

$('#bonus').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('form').attr('action', url)
});


$('#changesettings').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('form').attr('action', url)
});
</script>
@endsection