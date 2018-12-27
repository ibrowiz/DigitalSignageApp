 @extends('layouts.operator.master')
@section('content')
@include('partials.flash_message')
<div class="spacer">
            
 <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

     <div class="blog blog-success">

        <div class="blog-header "> <h5 class="blog-title">Payments Pending Approval</h5> </div>

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
                            <th>Action</th>
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
                                <td>
                                <a href='#' class = "btn btn-danger btn-xs" data-id="{{$payPendActvn->id}}" data-toggle="modal" data-url="{{url('/mediapartner/payment/delete/'. $payPendActvn->id)}}" data-target="#delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                   </div>
                </div>   
              </div>
          </div>
      </div> 
  </div>
  <div class="modal fade" id="delete">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Delete Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Delete this record?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-danger delete-url">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

@endsection

@section('extra-script')
<script type="text/javascript">
$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('.delete-url').attr('href', url)
});
</script>
@endsection
