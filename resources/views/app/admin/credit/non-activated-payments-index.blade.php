@extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
<div class="spacer">
 <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

     <div class="blog blog-success">

        <div class="blog-header "> <h5 class="blog-title">Transactions Pending Approval</h5> </div>

             <div class="blog-body">

         <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                  <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                            <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Receiving Account</th>
                            <th>File</th>
                            <th>Approve</th>
                            <th>Decline</th>
                        </tr>
                            </thead>
                            @foreach ($payPendActvns as $payPendActvn)
                            <tr>
                                <td>{{$payPendActvn->user_name}}</td>
                                <td>{{$payPendActvn->amount}}</td>
                                <td>{{$payPendActvn->receiving_account}}</td>
                                <td>
                                <a href='{{ asset("upload/$payPendActvn->image") }}'>{{ $payPendActvn->image }}</a>
                                </td>
                                
                               {{-- @if($payPendActvn->user_type=='App\Models\contentOwner')
                                <td>
                                   <a href='#' class = "btn btn-info btn-xs" data-id="{{$payPendActvn->id}}" data-toggle="modal" data-url="{{url('/admin/contentowner/payment/approve/'.$payPendActvn->id)}}" data-target="#Approve">Approve</a>
                                </td>
                                 <td>
                                  <a href='#' class = "btn btn-danger btn-xs" data-id="{{$payPendActvn->id}}" data-toggle="modal" data-url="{{url('/admin/contentowner/payment/decline/'.$payPendActvn->id)}}" data-target="#Decline">Decline</a>
                                </td>
                                @else--}}
                                <td>
                                   <a href='#' class = "btn btn-info btn-xs" data-id="{{$payPendActvn->id}}" data-toggle="modal" data-url="{{url('/admin/payment/approve/'.$payPendActvn->id)}}" data-target="#Approve">Approve</a>
                                </td>
                                <td>
                                  <a href='#' class = "btn btn-danger btn-xs" data-id="{{$payPendActvn->id}}" data-toggle="modal" data-url="{{url('/admin/payment/decline/'.$payPendActvn->id)}}" data-target="#Decline">Decline</a>
                                </td>
                                {{--@endif--}}
 
                            </tr>
                            @endforeach
                    </table>
                   </div>
                </div>   
              </div>
          </div>
      </div> 
  </div>
  <div class="modal fade" id="Approve">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Approve Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Approve this payment?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-info approve-url">Approve</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="Decline">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Decline Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Decline this payment?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-danger decline-url">Decline</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('extra-script')
<script type="text/javascript">
$('#Approve').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('.approve-url').attr('href', url)
});
$('#Decline').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('.decline-url').attr('href', url)
});
</script>
@endsection
