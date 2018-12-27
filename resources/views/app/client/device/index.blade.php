 @extends('layouts.contentowner.master')
@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">
            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Devices </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      


                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                            <th>Device Name</th>
                              <th>Serial No</th>
                              <th>Firmware ID</th>
                              <th>UU ID</th>
                              <th>Version</th>
                              <th>Settings</th>
                            </tr>
                          </thead>
                                <tbody>
                                     
                                           @if(count($devices) > 0)
                               @foreach($devices->where('status',1) as $device)
                                   <tr>
                                      <td>{{$device->device_name}}</td>
                                      <td>{{$device->serial_no}}</td>
                                      <td>{{$device->firmware_id}}</td>
                                      <td>{{$device->uu_id}}</td>
                                      <td>{{$device->version}}</td>
                                      <td>
                                        <a href='{{url("/client/{$tenant->domain}/device/settings/{$device->id}")}}' class = "btn btn-primary btn-xs">Settings</a></td> 
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