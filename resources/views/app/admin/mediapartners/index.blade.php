 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Media Patners</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                          <thead>
                            <tr>
                              <th>Domain</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th><center>Action</center></th>
                            </tr>
                          </thead>
                          <tbody>
                                     
                                  @if(count($tenants) > 0)
                               @foreach($tenants as $tenant)
                                   <tr>
                                      <td>{{$tenant->id}}</td>
                                      <td>{{$tenant->name}}</td>
                                      <td>{{$tenant->email}}</td>
                                      
                                      <td>
                                      <center>
                                       
                                        <a href='#' class = "btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</a> | 

                                        @if($tenant->status == 0)
                                          <a href='#' class = "btn btn-default btn-xs" data-id="{{$tenant->id}}" data-toggle="modal" data-url="{{url('/admin/tenant/activate/'. $tenant->id)}}" data-target="#activate">Activate</a>
                                        @endif 

                                        @if($tenant->status == 1)
                                        <a href='#' class="deactivate-btn btn btn-warning btn-xs" data-toggle="modal" data-id = "{{$tenant->id}}" data-url="{{url('/admin/tenant/deactivate/'. $tenant->id)}}" data-target="#deactivate">Deactivate</a>
                                        @endif 
                                        
                                      </center>
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

 
<div class="modal fade" id="activate">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Activation Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to Activate this Account?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-success activate-url">Activate</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


  <div class="modal fade" id="deactivate">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Deactivation Confirmation</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to deactivate this Account?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-danger form-url">Dectivate</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
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
            <p>Are you sure you want to delete this User Account?</p>
          </div>
          <div class="modal-footer">
            <a href='#' class = "btn btn-danger delete">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<!-- Spacer ends -->
@endsection



@section('extra-script')

<script type="text/javascript">

$('#activate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('.activate-url').attr('href', url)
});

$('#deactivate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('.form-url').attr('href', url)
});

</script>




@endsection
    