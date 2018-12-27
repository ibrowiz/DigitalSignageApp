 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Users</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                            <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th><center>Action</center></th>
                            </tr>
                          </thead>
                                <tbody>
                                     
                                  @if(count($admins) > 0)
                               @foreach($admins as $admin)
                                   <tr>
                                      <td>{{$admin->firstname}}</td>
                                      <td>{{$admin->lastname}}</td>
                                      <td>{{$admin->email}}</td>
                                      
                                      <td>
                                      <center>
                                     {{--  @if (Gate::check('admin.access') ) --}}
                                     {{-- @if (Gate::check('create'))--}}
                                        <a href='{{url("/admin/users/edit/{$admin->id}")}}' class = "btn btn-info btn-xs">Edit</a> | 
                                       <!--  <a href='#' class = "btn btn-danger btn-xs">Delete</a> --> 
                                     {{-- @endif--}}
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

<div class="modal fade" id="deleteUser">
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
            <form action="{{-- {{url('user/delete', [$user->id])}} --}}" method="post" accept-charset="utf-8">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>

              {{csrf_field()}}
              <button type="submit" class="btn btn-success"> <i class="fa fa-trash"></i>  Proceed</button>

            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<!-- Spacer ends -->
@endsection




        