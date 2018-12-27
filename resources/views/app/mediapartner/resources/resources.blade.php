@extends('layouts.operator.master')



@section('content')
<div class="container">
	<div class="row">

		 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


		welcome to resouces Manager

		<form action="{{URL::to('mediapartner/'.$tenant->domain.'/resource/upload')}}" method="post" enctype="multipart/form-data">
	select image to upload:
	<input type="file" name="file" id="file">
	<input type="submit" name="submit" value="upload">
	<input type="hidden" value="{{csrf_token()}}" name="_token">
</form> 
		
	</div>
</div>

@endsection()

@section('extra-script')


@endsection()