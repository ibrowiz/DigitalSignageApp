 @extends('layouts.admin.master')

@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"></h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Sender</th>
                              <th>Amount</th>
                              <th>Balance</th>
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($logs) > 0)
                               @foreach($logs as $log)
                                   <tr>
                                      <td>{{$log->senders_email}}</td>
                                      <td>{{$log->amount}}</td>
                                      <td>{{$log->balance}}</td>
                                      <!-- <td><a href='#' class = "btn btn-danger btn-xs">View</a></td> -->
                                      {{--<td> <a href='#' class = "btn btn-success btn-xs" data-id="{{$contentOwner->id}}" data-toggle="modal" data-url="{{url('admin/credit/assign/'. $contentOwner->id)}}" data-target="#credit">Credit Wallet</a> 
                                    </td>--}}
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
