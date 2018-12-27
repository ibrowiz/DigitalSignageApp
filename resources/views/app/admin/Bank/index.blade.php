 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->

          <div class="spacer">
           
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Content Owners</h5> </div>
                
              <div class="blog-body">
                   <div class="pull-left">
                   
              <a href="{{url('admin/bank/create')}}" class = "btn btn-info btn-rounded btn-transparent">Add Bank</a>
            
                </div>

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Account Number</th> 
                              <th>Sort Code</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($banks) > 0)
                               @foreach($banks as $index => $bank)
                                   <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$bank->name}}</td>
                                      <td>{{$bank->account_number}}</td>
                                      <td>{{$bank->sort_code}}</td>
                                      <td><a href='{{url("/admin/bank/edit/{$bank->id}")}}' class = "btn btn-info btn-xs">Edit</a></td>
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