@extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->

  <div class="spacer">
           
      <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Permissions</h5> </div>
                
              <div class="blog-body">
               <div class="pull-left">
                   
              <a href="{{route('admin.permission.create')}}" class = "btn btn-info btn-rounded btn-transparent">Add Permission</a>
            
                </div>

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Label</th>
                              <th>Description</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($permissions) > 0)
                               @foreach($permissions as $index => $permission)
                                   <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$permission->name}}</td>
                                      <td>{{$permission->label}}</td>
                                      <td>{{$permission->description}}</td>
                                      <td>
                                      <a href='{{route("admin.permission.edit",[$permission->id])}}' class = "btn btn-info btn-xs">Edit</a> | 
                                      <!-- <a href='#' class = "btn btn-danger btn-xs">Delete</a> -->
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
@endsection

