@extends('layouts.contentowner.master')

@section('content')
@include('partials.flash_message')
 {{--        <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         Widget starts
         <div class="blog blog-info">
           <div class="blog-header">
             <h5 class="blog-title">Chats</h5>
           </div>
           <div class="blog-body">
             <table class="table table-striped table-hover " id = "myTable">
   <thead>
     <tr>
       <th>Name</th>
       <th>Action</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
   @if(count($deviceGroups) > 0)
     @foreach($deviceGroups as $deviceGroup)
       <tr>
   <td>{{$deviceGroup->name}}</td>
   <td>
     <a href='' class = "label label-primary">Read</a> | 
       <a href='' class = "label label-success">Update</a> | 
       <a href='' class = "label label-danger" data-toggle="modal" data-target="#myModal">Delete</a>
     </td>
       
     <td>
     <a href='' class = "label label-primary">Read</a> | 
       <a href='' class = "label label-success">Update</a> | 
       <a href='' class = "label label-danger" data-toggle="modal" data-target="#myModal">Delete</a>
     </td>
   
 </tr>
   @endforeach
 @endif
      
   </tbody>
 </table>
           </div>
         </div>
         Widget ends
       </div>
       </div>
 
 <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="blog blog-success no-margin">
                     <div class="blog-header">
                          <h5 class="blog-title">Device Group</h5>
                             </div>
                             <div class="blog-body">
                        <table class="table table-striped table-hover " id = "myTable">
   <thead>
     <tr>
       <th>Name</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
   @if(count($deviceGroups) > 0)
     @foreach($deviceGroups as $deviceGroup)
       <tr>
   <td>{{$deviceGroup->name}}</td>
   <td>
     <a href='' class = "label label-primary">Read</a> | 
       <a href='' class = "label label-success">Update</a> | 
       <a href='' class = "label label-danger" data-toggle="modal" data-target="#myModal">Delete</a>
     </td>
       
 
   
 </tr>
   @endforeach
 @endif
      
   </tbody>
 </table> 
         </div>
     </div>
 </div>
     </div> --}}
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
                                      @if(count($deviceGroups) > 0)
                                          @foreach($deviceGroups as $deviceGroup)
                                          <tr>
                                           <td>{{$deviceGroup->name}}</td>
                                           <td>{{$deviceGroup->label}}</td>
                                           <td> 
                                               <a href='{{url("/user/devicegroup/edit/{$deviceGroup->id}")}}' class = "btn btn-info btn-xs">Edit</a> | 
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
