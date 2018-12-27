@extends('layouts.operator.master')
@section('content')

	<h1>
		Templates
	</h1>

	<div>
        <a href="{{URL::to('mediapartner/'.$tenant->domain.'/layouttemplates/create')}}">
            <i class="fa fa-desktop fa-1x"></i> 
            <button type="button" class="btn btn-success"> Create Templates </button>
        </a>
    </div>



	<div>
		@foreach($templates as $template)

			<span class="thumbnail" style="display: inline-block; padding: 5px; "> <img src="{{$template->image}}" class="img img-rounded" style="width: 350px; height: 300px;"> 
				 <a href='{{url("mediapartner/{$tenant->domain}/layouttemplates/edit/{$template->id}")}}' class = "fa fa-pencil-square-o">{{$template->file_name}} </a>
			</span>

		@endforeach
	</div>
@endsection


@section('extra-script')

<script type="text/javascript">


// var canvas = new fabric.Canvas('canvas', { isDrawingMode: true });
// $("#select").click(function(){
//     canvas.isDrawingMode = false;
// });
// $("#draw").click(function(){
//     canvas.isDrawingMode = true;
// });

// $("#canvas2png").click(function(){
//     canvas.isDrawingMode = false;

//     if(!window.localStorage){
//     	alert("This function is not supported by your browser."); 
//     	return;
//     }
//     // to PNG
//   var dataURL = canvas.toDataURL({
//   format: 'png',
//   quality: 0.8
// });

// 	Video(dataURL);
  
// });

// function Video(src){

//     var video = $('<Img> ', {
//         id: 'resources',
//         src: src ,
       
//     });

//      video.appendTo($('#trial'));

// }
// // Adding objects to the canvas...

// // adding text
// var text = new fabric.Text('Text inside canvas', { 
//   left: 10, 
//   top: 50 
// });
// text.hasRotatingPoint = true;
// canvas.add(text);

// // adding circle
// var circle = new fabric.Circle({
//     left: 200,
//     top: 150,
//     radius: 50,
//     fill: "#299b71"
// });
// circle.hasRotatingPoint = true;
// canvas.add(circle);

// // adding triangle
// var triangle = new fabric.Triangle({
//     left: 130,
//     top: 150,
//     strokeWidth: 1,
//     width:70,height:90,
//     stroke: 'black',
//     fill:'#ff8a1b',
//     selectable: true,
//     originX: 'center'
// });
// triangle.hasRotatingPoint = true;
// canvas.add(triangle);

</script>

@endsection