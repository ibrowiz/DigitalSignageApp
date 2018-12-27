@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Partners</div>
                <div class="panel-body">

                   <div class="table-responsive">
<table class="table table-striped table-hover " id = "myTable">
  <thead>
    <tr>
      <th>Name</th>
      <th>Domain</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
  @if(count($tenants) > 0)
    @foreach($tenants as $partner)
      <tr>
          <td>{{$partner->name}}</td>
          <td>{{$partner->domain}}</td>
          <td>{{$partner->email}}</td>
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