@extends('layouts.admin.master')

@section('content')

 <div class="spacer">
        <div>
            <a href="{{URL::to('admin/layouttemplates')}}"> 
                <i class="fa fa-desktop fa-1x"></i> 
                <button type="button" class="btn btn-success"> Create Layout </button>
            </a>
        </div>
        @if(session('info'))
          <div class=" col-md-4 alert alert-danger">
            {{session('info')}}
          </div>
        @endif
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">
          <div class="blog blog-success">
            <div class="blog-header "> <h5 class="blog-title">Layouts</h5></div>
              <div class="blog-body">
                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <div class="table-responsive">
                      <table class="table table-striped table-hover data-table" >
                      <thead>
                      <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(count($layouts) > 0 )
                        @foreach($layouts->all() as $layout)
                          <tr>
                            <td>{{$layout->id}}</td>
                            <td>{{$layout->title}}</td>
                            <td>
                              <a href='#{{--{{url("admin/layout/view/{$layout->id}")}}--}}' class="label label-primary"> view</a> <a href= '#{{--{{url("admin/layout/destroy/{$layout->id}")}}--}}' class="label label-danger">delete</a>|
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
@endsection()
