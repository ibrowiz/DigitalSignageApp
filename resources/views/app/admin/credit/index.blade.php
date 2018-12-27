 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Allocate Credit</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Media Partner</th>
                              <th>Transactions</th>
                              <th>Assign</th>
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($contentOwners) > 0)
                               @foreach($contentOwners as $contentOwner)
                                   <tr>
                                      <td>{{$contentOwner->name}}</td>
                                      <td>{{$contentOwner->email}}</td>
                                      <td>{{$contentOwner->tenant_domain}}</td>
                                      <td><a href='{{url("/admin/user/transactions/{$contentOwner->id}")}}' class = "btn btn-info btn-xs">Transactions</a></td>
                                      <td> <a href='#' class = "btn btn-success btn-xs" data-id="{{$contentOwner->id}}" data-toggle="modal" data-url="{{url('admin/credit/assign/'. $contentOwner->id)}}" data-target="#credit">Credit Wallet</a> 
                                    </td>
                                    </tr>
                                   
                                  @endforeach
                                @endif     
                                 
                            </tbody>
                        </table>    
                      </div>
                  </div>
                 
              </div>
          </div>
      </div> 
  </div>
<!-- Spacer ends -->
<div class="modal fade" id="credit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Add Credit</h4>
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
                        id="amount" placeholder="Amount"/>
                    </div>
                  </div>
                
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                </form>
          </div>
          <div class="modal-footer">
           <!--  <a href='#' class = "btn btn-success activate-url">Add</a> -->
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endsection



@section('extra-script')

<script type="text/javascript">

$('#credit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('form').attr('action', url)
});

</script>




@endsection
        