 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Standard Templates</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      


                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                          <th>S/N</th>
                          <th>Name</th>
                          <th>Edit</th>
                            </tr>
                          </thead>
                                <tbody>
                                     
                                           @if(count($templates) > 0)
                               @foreach($templates as $index => $template)
                                   <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$template->name}}</td>
                                        
                                        <td><a href='{{url("/admin/template/edit/{$template->id}")}}' class = "btn btn-info btn-xs">Edit</a></td>
                                          
                                  </tr>
                               @endforeach`
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




        