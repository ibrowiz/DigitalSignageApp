 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->

          <div class="spacer">
           
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Plans</h5> </div>
                
              <div class="blog-body">
                   <div class="pull-left">
                   
              <a href="{{url('admin/plan/create')}}" class = "btn btn-info btn-rounded btn-transparent">Add Plan</a>
            
                </div>

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th>Amount</th>
                              <th>Offers</th> 
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($plans) > 0)
                               @foreach($plans as $index => $plan)
                                   <tr>
                                      <td>{{$index + 1}}</td>
                                      <td>{{$plan->name}}</td>
                                      <td>{{$plan->amount}}</td>
                                      <td>{{$plan->offers}}</td>
                                      <td><a href='{{url("/admin/plan/edit/{$plan->id}")}}' class = "btn btn-info btn-xs">Edit</a></td>
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