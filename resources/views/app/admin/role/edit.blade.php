@extends('layouts.admin.master')
@section('content')

<div class="spacer">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="blog blog-success no-margin">
                            <div class="blog-header">
                                 <h5 class="blog-title">Edit Role</h5>
                            </div>
                                    <div class="blog-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.role.update',[$role->id]) }}">
                        {{ csrf_field() }}
                       
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$role->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="label" class="col-md-4 control-label">label</label>

                            <div class="col-md-6">
                                <input id="label" type="text" class="form-control" name="label" value="{{$role->label}}" required autofocus>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="description" class="col-md-4  control-label">Description</label>
                                <div class="col-md-6">
                                 <textarea class="form-control" name = "description"  rows="3" id="description">{{$role->description}}</textarea>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">

                                <div class="panel-heading">
                                    Permission ({{$permissions->count()}})
                                </div>

                            <div class="panel-body">

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    
                                    @foreach($permissions as $permission)

                                <div class="col-xs-4">
                                    <label class="check">
                                        <input type="checkbox" name="permission[]" {{$role->Permissions->contains('id', $permission->id) ? 'checked' :''}}  value="{{$permission->id}}"> {{$permission->description}}
                                    </label>
                                </div>

                            @endforeach

                                </div>

                            </div>

                        </div>
                         
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



