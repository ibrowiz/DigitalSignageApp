@extends('layouts.operator.master')

@section('content')
@include('partials.flash_message')

     <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Device Groups </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      


                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                           <th>Name</th>
                           <th>Label</th>
                           <th>Action</th>
                            </tr>
                              </thead>
                                <tbody>
                                      @if(count($tenant->deviceGroups) > 0)
                                          @foreach($tenant->deviceGroups as $deviceGroup)
                                          <tr>
                                           <td>{{$deviceGroup->name}}</td>
                                           <td>{{$deviceGroup->label}}</td>
                                           <td> 
                                               <a href='{{url("mediapartner/{$tenant->domain}/devicegroup/edit/{$deviceGroup->id}")}}' class = "btn btn-info btn-xs">Edit</a> | 
                                               <a href='#' class = "btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">Delete</a>

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
@endsection
