 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Content Owners</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Media Partner Domain</th>
                              <th>Email</th>
                              <th><center>Action</center></th>
                            </tr>
                          </thead>
                                <tbody>
                                     
                                  @if(count($contentOwners) > 0)
                               @foreach($contentOwners as $contentOwner)
                                   <tr>
                                      <td>{{$contentOwner->name}}</td>
                                      <td>{{$contentOwner->tenant_domain}}</td>
                                      <td>{{$contentOwner->email}}</td>
                                      
                                      <td>
                                      <center>
                                        <!-- <a href='{{-- {{url("/admin/users/edit/{$admin->id}")}} --}}' class = "btn btn-info btn-xs">Edit</a> | --> 
                                        
                                        <a href='#' class = "btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</a> | 

                                        @if($contentOwner->status == 0)<a href='#' class = "btn btn-default btn-xs" data-toggle="modal" data-target="#activate">Activate</a>@endif  
                                        @if($contentOwner->status == 1)<a href='#' class = "btn btn-warning btn-xs" data-toggle="modal" data-target="#deactivate">Deactivate</a>@endif 
                                        
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
            <a href='{{url("/admin/contentowner/activate/{$contentOwner->id}")}}' class = "btn btn-success">Activate</a>
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
            <a href='{{url("/admin/contentowner/deactivate/{$contentOwner->id}")}}' class = "btn btn-danger">Dectivate</a>
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
            <a href='{{url("/admin/delete/contentowner/{$contentOwner->id}")}}' class = "btn btn-danger">Delete</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>


<!-- Spacer ends -->
@endsection




        