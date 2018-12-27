@extends('layouts.admin.master')




@section('content')

	<div class="row">

		<div class="col-md-12">
			

			<form action="{{ url('admin/resource/upload') }}" class="dropdone" id="file-upload" method="post" enctype="multipart/form-data">
			  	{{ csrf_field() }}

			  	<div class="col-md-3">
		    	<input name="file" type="file" class="form-control" /></div>
		    	<div class="col-md-4">
		    		@if(count($contents)>0)

		    		
		    		<select name="content" class="form-control" >
		    			@foreach($contents as $content)
				    	<option value="{{$content->id}}">{{$content->name}}</option>
				    	@endforeach
				    </select>
				    

				    @endif
				</div>
		    	<button type="submit" class="btn btn-default">Upload</button>
			  
			</form>

		</div><br>
		
	</div>

	<div class="row">

		<div >
			<br>
			@foreach($resources as $resource)

				@if($resource->file_ext ==='mp4')

				<div class="col-md-2">
					<span class="thumbnail" style="display: inline-block; padding: 5px;" >
						<a href= '{{url("admin/resource/delete/{$resource->id}")}}'> <i class="fa fa-trash"></i> </a>
						<video class="video" style="width: 200px; height: 200px">
		                  <source src="{{ asset('storage/'.$resource->path . $resource->file_name)}}">
		                </video>
		                <div class="caption">
                              <span>{{$resource->label}}</span>
                        </div>

	           		 </span>
	             </div>

	             @elseif($resource->file_ext ==='mp3')

					<div class="col-md-2">
						<span class="thumbnail" style="display: inline-block; padding: 5px;" >
							<a href= '{{url("admin/resource/delete/{$resource->id}")}}'> <i class="fa fa-trash"></i> </a>
							<audio class="video" style="width: 200px; height: 200px">
			                  <source src="{{ asset('storage/'.$resource->path . $resource->file_name)}}">
			                </audio>
			                <div class="caption">
	                              <span>{{$resource->label}}</span>
	                        </div>

		           		 </span>
		             </div>		
					
				@else
					<div class="col-md-2">
						<span class="thumbnail"  style="display: inline-block; padding: 5px;">
							<a href= '{{url("admin/resource/delete/{$resource->id}")}}'> <i class="fa fa-trash "></i> </a>
							<img src="{{ asset('storage/'.$resource->path . $resource->file_name)}}" class="img img-rounded" style="width: 200px; height: 200px">
							<div class="caption">
                              <span>{{$resource->label}}</span>
                             </div>
						</span>
					</div>

				@endif

			@endforeach

		</div>

	</div>

@endsection





@section('extra-css')

<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

@endsection






@section('extra-script')

    <script src="{{ URL::to('js/dropzone.js') }}"></script>
	
	<script type="text/javascript">
		var myDropzone = new Dropzone("#file-upload", { url: "{{ url('resource/upload') }}"});
	</script>

@endsection