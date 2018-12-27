@extends('layouts.admin.master')
@section('extra-css')
 <link rel="stylesheet" href="{{URL::to('css/chkbox.css') }}">
 <script src="{{ URL::to('js/chkboxevnt.js') }}"></script>
@endsection
@section('content')
@include('partials.flash_message')
<!-- Row Starts -->
<div class = "spacer">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog">
        <div class="blog-header">
          <h5 class="blog-title">Edit Templates</h5>
        </div>
        <div class="blog-body">
          <form class="form-horizontal" role="form"  method="POST" action="{{ route('template.updatesettings',[$template->id])}}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="contentcategory" class="col-lg-2 control-label">Content Category</label>
              <div class="col-xs-10 col-sm-5">
                <select name = "contentCategory" class="form-control" id="contentCategory">
                <option value = " ">Select</option>
                @foreach($contentCategories as $contentCategory)
                <option {{ $template->content_category_id == $contentCategory->id ? "selected":"" }} value="{{$contentCategory->id }}">{{$contentCategory->name }}</option>
                @endforeach
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="contents" class="col-lg-2 control-label">content</label>
              <div class="col-xs-10 col-sm-5">
                <select name = "contents" class="form-control" id="contents">
                  <option value = " ">Select</option>
                    @foreach($contents as $content)
                    <option {{$template->content_id == $content->id ? "selected":""}}
                    value="{{$content->id }}">{{$content->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
      <div class="form-group">
      <div>
        <label for="" class="col-lg-2 control-label" >Allow public content?</label>
          <input type="checkbox" name="publicContent" {{$template->public_content_allowed ? 'checked':''}} value="1" id=""/>
            <div class="reveal-if-active">
            <div>
            @foreach($contentCategories as $contentCategory)                  
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
           <div class="col-xs-5 ">
           <label class="check"><h5>{{$contentCategory->name}}</h5></label>
           </div>
          <div  id="" class="col-md-12 col-sm-12 col-xs-12">
           @foreach($contentCategory->contents as $index => $content)
        <div class="col-xs-6">
     <label class="check">
      <input type="checkbox" class="contentcheckbox" name="content[{{$index}}]" {{$template->contents->contains('id', $content->id) ? 'checked':''}} value="{{$content->id}}">{{$content->name}}
    </label></br>&nbsp;&nbsp;                                                       
    <input type="radio" class="allowed-radio" name="status[{{$index}}]" value="1" @if($template->contents->contains($content->id)) {{ $template->contents->where('id', $content->id)->first()->pivot->status == "1" ? 'checked' : '' }} @endif>Allowed

      <input type="radio" class="flagged-radio" name="status[{{$index}}]" value="0" @if($template->contents->contains($content->id)) {{ $template->contents->where('id', $content->id)->first()->pivot->status == "0" ? 'checked' : '' }} @endif>Flagged
     </div>                         
     @endforeach
     </div>
   </div>
  @endforeach
   </div>
    </div>
      </div>
       </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
<!-- Row Ends -->
</div>        
@endsection
@section('extra-script')
<script type="text/javascript">

 $('.allowed-radio, .flagged-radio').on('change', function() {
      $(this).prevAll('.check').children('.contentcheckbox').prop("checked", true);
    });

    $('.contentcheckbox').on('change', function(e) {
      var isChecked = e.target.checked;
      if (isChecked == true) {
        $(this).parent().siblings('.allowed-radio').prop("checked", true);
      } else {
        $(this).parent().siblings('.allowed-radio').prop("checked", false);
        $(this).parent().siblings('.flagged-radio').prop("checked", false);
      }
    });

$('#contentCategory').change(function(){
    var contentCategoryID = $(this).val();  
    console.log(contentCategoryID);    
    if(contentCategoryID){
        $.ajax({
           type:"GET",
          url:"{{url('/getContent')}}?content_category_id="+contentCategoryID,
           success:function(res){              
            if(res){
                $("#contents").empty();
                $("#contents").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#contents").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#contents").empty();
            }
           }
        });
    }else{
        $("#contents").empty();
        //$("#city").empty();
    }      
   });
   </script>
@endsection