 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Allowed Content</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                            <th>name</th>
                              <th>Category</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                                <tbody>
                                     
                                  @if(count($contents) > 0)
                               @foreach($contents as $content)
                                   <tr>
                                      <td>{{$content->name}}</td>
                                      <td>{{$content->contentCategory->name}}</td>
                                      
                                      <td>
                                      <center>
                                        <a href='{{url("/admin/allowedcontent/edit/{$content->id}")}}' class = "btn btn-info btn-xs">Edit</a> | 
                                        <!-- <a href='#' class = "btn btn-danger btn-xs">Delete</a> --> 
                                        
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
<!-- Spacer ends -->
@endsection




        