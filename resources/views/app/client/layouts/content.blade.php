@extends('layouts.master')




@section('content')




<div class="col-md-6 col-md-offset-2">
     <form class="form-horizontal" id="form" method="POST" action="{{url('insert')}}">
                                    {{csrf_field()}}
                                <fieldset>

                                    <h4>
                                        <span class="btn btn-info">Create New Content Type</span>

                                        </h4>
                                    <div class="form-group">
                                        <label class="control-label"> Content Name </label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="control-label"> Content Category </label>
                                        <select class="form-control" id="category" name="category">
                                        <option value="Health" >Health</option>
                                        <option value="Resturant" >Resturant</option>
                                        <option value="Housing / Accomodation"> Housing / Accomodation</option>
                                        <option value="Pharmaceutical">Pharmaceutical</option>
                                        <option value="Biotech" >Biotech</option>
                                    </select>
                                    </div>
                                    

                                    <div>
                                        <button type="submit" class="btn btn-success" id="content-type"> Add New</button>
                                    
                                    </div>

                                </fieldset>

                            </form>
</div>

<div class="col-md-6 col-md-offset-2" style="margin-top: 80px;">
<table class="table table-striped table-hover">
     <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Category</th>
                    </tr>
                  </thead>
                  <tbody>
    @foreach($contents as $content)

    <tr>
        <td>{{$content->id}}</td>
        <td>{{$content->name}}</td>
        <td>{{$content->category}}</td>

    </tr>
    @endforeach
</tbody>
</table>
</div>


  
@endsection


@section('extra-script')




@endsection
