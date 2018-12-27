
@extends('layouts.admin.fileMaster')
@section('extra-css')

<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

@endsection


@section('content')

  <div class="row">
   <div class="col-md-9 col-md-offset-1"><br>
      
      <canvas id="draw" style="border: 2px solid grey; "> </canvas> <br>
      <div>
        <button class="btn btn-primary" id="save-canvas" type="button" >Save</button>
        <button class="btn btn-warning" id="preview" type="button" data-toggle="modal" data-target="#show" >Preview</button>
      </div>
   </div><!--end col-md 10 -->

    <div class="col-md-1">
      <div class="setup" >
        <button type="button" class="btn btn-lg glyphicon glyphicon-trash" id="trash" title="delete"></button>      
      </div>
      <button type="button" class="btn btn-lg glyphicon glyphicon-folder-open" id="copy" title="Copy"></button><br>
      <button type="button" class="btn btn-lg glyphicon glyphicon-new-window" id="paste" title="Paste"></button><br>
      <button type="button" class="btn btn-lg glyphicon glyphicon-export" id="forward" title="BringForward"></button><br>
      <button type="button" class="btn btn-lg glyphicon glyphicon-import" id="back" title="SendBack"></button>
    </div>
  </div>
  <div id="modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <form>
        <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Select Resources </h4>
            </div>
            <div class="resources-body form-group">
              <select id="resource" class="form-control">
                
                @foreach($resources as $resource)
                  <option value="{{$resource->file_name}}" data-content_id="{{$resource->content_id}}" data-tag="{{$resource->tag}}" data-path="{{$resource->path}}" data-ext="{{$resource->file_ext}}">{{$resource->label}}</option>
                @endforeach
              </select>
              <div class="modal-footer">
              <button type="button" class="btn btn-default " data-dismiss="modal"  >Close</button>
              <button type="button" class="btn btn-success add" data-dismiss="modal">Add</button> 
              </div>                             
            </div>
        </div>
      </form>

    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="show">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Layout Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <!-- <canvas id="view" width="600" height="600"></canvas> -->
          <video id="video" class="video hidden">
        </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
      </div>
    </div>
  </div>
</div>


  <div id="trial">     

    <video  controls="true" buffered="0" id="video" class="video hidden">
       
    </video>

    <video  controls="true" buffered="0" id="stvideo" class="video hidden">
       
    </video>

      <!-- <iframe src="https://www.telvida.com" width="420" height="300" id="web"></iframe> -->

    <div id="webpage">
         
     </div>
  </div>

@endsection

@section('extra-script')


<script type="text/javascript">
    //draw canvas
  var can = new fabric.Canvas('draw');

  can.setDimensions({width:(window.innerWidth -550), height: window.innerHeight - 150});
  var cw = can.width;
  var ch = can.height;
  // can.loadFromJSON(<?= json_encode($template->layout) ?>);

  var obj = JSON.parse((<?= json_encode($template->layout) ?>));
  var type = obj.objects;
  var name = ((<?= json_encode($template->file_name) ?>));
  
  document.getElementById('title').value = name;
for (var i = type.length - 1; i >= 0; i--) {

    if((type[i].type)=="image"){

      if((type[i].src).match('.png') || (type[i].src).match('.jpg') ||(type[i].src).match('.jpeg')||(type[i].src).match('.gif')){
        image(type[i], 1, 1,can);
      }

    }else if((type[i].type)=="i-text"){ 
      console.log(type[i]);
      console.log(type[i].name);
      console.log(type[i].weblink);
    
     var text = new fabric.IText(type[i].text, {
        fill:type[i].fill,
        fontSize:(type[i].fontSize),
        fontFamily:type[i].fontFamily,
        left:(type[i].left),
        top:(type[i].top), 
        name:type[i].name,
        weblink:type[i].weblink,
        tag:"",
        content_id:0,                 
      });
     text.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name:name,
          weblink:"",
          tag:'',
          content_id:0,
        });
      };
    })(text.toObject);
    console.log(type[i].weblink);
      can.add(text);

  } else if((type[i].type)=="rect"){

     rectangle(type[i], 1, 1, can);         

  }else if((type[i].type)=="triangle"){

      triangle(type[i], 1, 1, can);

  }else if((type[i].type)=="circle"){

      circle(type[i], 1, 1, can);

  }

} //ends here

//trial

$('#modal-youtube').on('click', 'button.ok', function(e){
  var url = ($(this).parent('div').parent('div').find('input:text').val());
  var content_id = parseInt(($(this).parent('div').parent('div').find('option:selected').data('content_id')));
  var tag = ($(this).parent().parent('div').find('option:selected').val());

   console.log(url);
   console.log(content_id);
   console.log(tag);
  var id = youtube_parser(url);
  console.log(id);
  var load = 'https://img.youtube.com/vi/'+id+ '/hqdefault.jpg';
  console.log(load);
  fabric.Image.fromURL(load, function(oImg) {

    oImg.set({'left':150});
    oImg.set({'top':50});

    oImg.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: 'youtube',
          weblink:url,
          tag:tag,
          content_id:content_id,
        });
      };
    })(oImg.toObject);

    can.add(oImg);
  });


});




$('.date').on('click', '.time', function(e){

    var shapeProp = $(this).parent('div').find('.date-properties');
    shapeProp.toggleClass('hidden');
            
 });

  $('.date').on('click', '.data', function(e){
         
    var action = $(this).attr('action');


    switch(action){

      case 'date': 
      
      date(can);
      
      var shapeProp = $(this).parent('div').parent('div.date-properties');
      shapeProp.addClass('hidden');

      break;

      case 'time':

      time(can);

      var shapeProp = $(this).parent('div').parent('div.date-properties');

      shapeProp.addClass('hidden');

      break;

      case 'date&time': 
      dateTime(can);

      var shapeProp = $(this).parent('div').parent('div.date-properties');

      shapeProp.addClass('hidden');

      break;

      default: console.log(action);

      break;
    }


  });
  

//modal class for web

$('#modal-web').on('click', 'button.ok', function(e){
    var url = ($(this).parent().find('input:text').val());
    var content_id = parseInt(($(this).parent().find('option:selected').data('content_id')));
    var tag = ($(this).parent().find('option:selected').val());

   console.log(url);
   console.log(content_id);
   console.log(tag);

   web(url);

   dragElement(document.getElementById(("resources")));

        var img ="{{asset('images/example.png')}}";


        weblink(img, tag, content_id);       

});

    // $('.modal-footer').on('click', 'button.add', function(e){
$('.resources-body').change('#resource', function(){
     var resource = ($(this).find('option:selected').attr('value'));
     console.log(resource);
});

$('.resources-body').on('click', 'button.add', function(e){
  var resource = ($(this).parent('div').parent('div').find('option:selected').val());
  var path = ($(this).parent('div').parent('div').find('option:selected').data('path'));
  var ext = ($(this).parent('div').parent('div').find('option:selected').data('ext'));
  var content_id = parseInt($(this).parent('div').parent('div').find('option:selected').data('content_id'));
  var tag = ($(this).parent('div').parent('div').find('option:selected').data('tag'));
  console.log(ext);
  console.log(resource);
  var image =  "{{asset('storage')}}"+"/"+ path +"/"+resource;

    if ((ext === 'jpg') ||(ext ==='png') ||(ext ==='jpeg')||(ext ==='gif')){
        console.log(image);
        console.log(tag);
        console.log(content_id);
        imgResource(image, can, tag, content_id);

    } else if((ext === 'mp4') ||(ext ==='mp4')){
      var load = "{{asset('storage')}}"+"/video.png";
       console.log(image);
       vidResource(image,load,can, tag, content_id);
    }
});


$('.shape').on('click', 'button.click-shape', function(e){

    var shapeProp = $(this).parent('.shape').find('.shape-properties');
    shapeProp.toggleClass('hidden');
    
});

    //shape drawing 'rectangle', 'circle', 'triangle';
$('.shape').on('click', '.object', function(e){


    var action = $(this).attr('action');

        switch(action){

          case 'rectangle': 
              rect();

              var shapeProp = $(this).parent('div').parent('div.shape-properties');

              shapeProp.addClass('hidden');

          break;

          case 'triangle': 
              
              tria();

              var shapeProp = $(this).parent('div').parent('div.shape-properties');

              shapeProp.addClass('hidden');


          break;

          case 'circle': 
              circ();

              var shapeProp = $(this).parent('div').parent('div.shape-properties');

              shapeProp.addClass('hidden');

          break;
          
          default: console.log(action);
          
          break;
        }
        //shape drawing ends here
});


    //Text object;
$('#text').on('click', function(e){

    itext();     
});

$('.object_container').on('click', '.list_element', function(){
        $(this).addClass('selected');
});
        //widget upload
    
$('.shape').on('click', '.action', function(e){

  var action = $(this).attr('action');
  
  if(action == 'cancel'){
      var shapeProp = $(this).parent('div').parent('div.shape-properties');

      shapeProp.addClass('hidden');

  }else if(action == 'ok'){
      var result = $(this).parent('div').parent('div.shape-properties').find('#city');
      var city = result.val();

      if(city === 'Abeokuta'){
          var img = document.getElementById('Abeokuta');
      
      }else if(city === 'Abuja'){
          var img = document.getElementById('Abuja');
          
      }else if(city === 'Lagos'){
          var img = document.getElementById('Lagos');
          
      }else if(city === 'Ibadan'){
          var img = document.getElementById('Ibadan');
      
      }

  widget(img);

  var shapeProp = $(this).parent('div').parent('div.shape-properties');

  shapeProp.addClass('hidden');

  }
});
      // object selected on canvas properties display
can.on('object:selected', function(e) {
    e.target.bringToFront();
    // e.target.bringToBack();
       var activeObject = can.getActiveObject();


    $('back').on('click', function(evt){
      var obj = can.getActiveObject();
      sendBackwards(obj);
    });


     $('forward').on('click', function(evt){
      var obj = can.getActiveObject();
      bringForwards(obj);
    });

    var objectType = can.getActiveObject().get('type');
    var bar = $('.properties');
    bar.css({'position' : 'absolute', 'left': parseInt(activeObject.left) + 'px', 'top' : parseInt(activeObject.top) -30 +'px', 'z-index' : '1000'});
    bar.removeClass('hidden');
    var shapeProp = $('.properties').children('button');


    console.log(objectType);

    if((objectType==='text')||(objectType==='i-text')){
        
      var objectSize = activeObject.fontFamily;
      showSetting('text-tool');
       // toolset properties
      var fontSize = activeObject.fontSize;
      var fill = activeObject.fill;
      var fontWeight =  activeObject.fontWeight;
      var fontStyle =  activeObject.fontStyle;
      var fontFamily = activeObject.fontFamily;

      $('select[data-name="fontFamily"]').val(fontFamily);
      $('input[data-name="fontSize"]').val(fontSize);
      $('input[data-name="color"]').val(fill);
      $('select[data-name="fontWeight"]').val(fontWeight);
      $('select[data-name="fontStyle"]').val(fontStyle);
    }
    else if (objectType === 'rect'){
      showSetting('rectangle-tool');
        // toolset properties
      var width = activeObject.width;
      var fill = activeObject.fill;
      var height =  activeObject.height;
      var stroke =  activeObject.strokeWidth;
      var scolor = activeObject.stroke;

     $('input[data-name="width"]').val(width);
     $('input[data-name="color"]').val(fill);
     $('input[data-name="height"]').val(height);
     $('input[data-name="strokeWidth"]').val(stroke);
     $('input[data-name="stroke"]').val(scolor);


    } else if (objectType === 'circle'){
      showSetting('circle-tool');
      var radius = activeObject.radius;
      var fill = activeObject.fill;
      var stroke =  activeObject.strokeWidth;
      var scolor = activeObject.stroke;

     $('input[data-name="radius"]').val(radius);
     $('input[data-name="color"]').val(fill);
     $('input[data-name="strokeWidth"]').val(stroke);
     $('input[data-name="stroke"]').val(scolor);
    }

    else if (objectType === 'triangle'){
      showSetting('triangle-tool');
        // toolset properties
      var width = activeObject.width;
      var fill = activeObject.fill;
      var height =  activeObject.height;
      var stroke =  activeObject.strokeWidth;
      var scolor = activeObject.stroke;

     $('input[data-name="width"]').val(width);
     $('input[data-name="color"]').val(fill);
     $('input[data-name="height"]').val(height);
     $('input[data-name="strokeWidth"]').val(stroke);
     $('input[data-name="stroke"]').val(scolor);
    }

    else if (objectType === 'image'){
      showSetting('image-tool');
        // toolset properties
      var width = activeObject.scaleX;
      console.log(width);
      var fill = activeObject.fill;
      var height =  activeObject.scaleY;
      var stroke =  activeObject.strokeWidth;
      var scolor = activeObject.stroke;

       $('input[data-name="width"]').val(width);
       $('input[data-name="color"]').val(fill);
       $('input[data-name="height"]').val(height);
       $('input[data-name="strokeWidth"]').val(stroke);
       $('input[data-name="stroke"]').val(scolor);
    }
        
});///ol

can.on('before:selection:cleared', function() {
  var bar = $('.properties');
  bar.addClass('hidden');
  $('.current-tool').children().hide();
});


  
    // fill for selected object
$('.properties').on('click', 'button.click-shape', function(e){

    var shapeProp = $(this).parent('.properties').find('.shape-properties');
    shapeProp.toggleClass('hidden');
});

$('.properties').on('click', '.action', function(e){


  var action = $(this).attr('action');

  if(action == 'cancel'){
  var shapeProp = $(this).parent('div').parent('div.shape-properties');

  shapeProp.addClass('hidden');
  }else if(action == 'ok'){

  var color = $(this).parent('div').parent('div.shape-properties').find('.color-prop');
  var acttiveObject = can.getActiveObject();
      if(acttiveObject){
        can.getActiveObject().set("fill", color.val());
        can.renderAll();
      }
      else{
          alert('please select an object');
      }

  }

  var shapeProp = $(this).parent('div').parent('div.shape-properties');
  shapeProp.addClass('hidden');
});


$('.click-shape').on('click',function(e){
  var obj = $(this).parent('div').find('.obj-properties');
  obj.toggleClass('hidden');
});

$('.obj-properties').on('click', '.action', function(e){

    var action = $(this).attr('action');

    if(action == 'cancel'){
    var shapeProp = $(this).parent('div').parent('div.obj-properties');

    shapeProp.addClass('hidden');
    }else if(action == 'ok'){

    var color = $(this).parent('div').parent('div.obj-properties').find('.color-prop');
    var acttiveObject = can.getActiveObject();
        if(acttiveObject){
            can.getActiveObject().set("fill", color.val());
            can.renderAll();
        }
        else{
            alert('please select an object');
        }

    }

    var shapeProp = $(this).parent('div').parent('div.obj-properties');

    shapeProp.addClass('hidden');
});
          // outline for selected object
$('.properties').on('click', 'button.outline', function(e){

  var shapeProp = $(this).parent('.properties').find('.outline-properties');
  shapeProp.toggleClass('hidden');

});

          
$('.properties').on('click', '.action', function(e){

    var action = $(this).attr('action');

    if(action == 'cancel'){
      var shapeProp = $(this).parent('div').parent('div.outline-properties');
      console.log(shapeProp);

      shapeProp.addClass('hidden');
      }else if(action == 'ok'){

      var color = $(this).parent('div').parent('div.outline-properties').find('.outline');
      var acttiveObject = can.getActiveObject();
        if(acttiveObject){
            can.getActiveObject().set("stroke", color.val());
            can.renderAll();
        }
        else{
            alert('please select an object');
        }

    }
    var shapeProp = $(this).parent('div').parent('div.outline-properties');

    shapeProp.addClass('hidden');
});

       // outline fill

$('.outline').on('click',function(e){
    var obj = $(this).parent('div').find('.line-properties');
    obj.toggleClass('hidden');
});

$('.line-properties').on('click', '.action', function(e){

  var action = $(this).attr('action');

  if(action == 'cancel'){
  var shapeProp = $(this).parent('div').parent('div.line-properties');

  shapeProp.addClass('hidden');
  }else if(action == 'ok'){

    var color = $(this).parent('div').parent('div.line-properties').find('.outline');
    var acttiveObject = can.getActiveObject();
      if(acttiveObject){
          can.getActiveObject().set("stroke", color.val());
          can.renderAll();
      }
      else{
          alert('please select an object');
      }
  }

  var shapeProp = $(this).parent('div').parent('div.line-properties');
  shapeProp.addClass('hidden');
});


$('#save-canvas').on('click', function(evt){

  var token = "{{csrf_token()}}";
  var url = "{{ url('admin/save-canvas')}}";
  var title = document.getElementById('title').value;
  var aspect_ratio = document.getElementById('aspect_ratio').value;
  var orientation = document.getElementById('orientation').value;
  // var content_type = document.getElementById('content_type').value;
  // var category = document.getElementById('category').value;
  var background_color = ((can.backgroundColor) || 'white');
  $.ajax({
      type: 'post',
      url: url, 
      data : { '_token': token, 'canvas' : JSON.stringify(can), 'title':title, 'aspect_ratio':aspect_ratio, 'orientation':orientation,'background_color':background_color},
      success:function(data){
          window.location="{{url('admin/layout/welcome')}}";
          console.log(JSON.stringify(can));
      
      }

  });
});




  //preview
   $('#preview').on('click', function(evt){

    var canvas_element = document.createElement('canvas');
        canvas_element.setAttribute('id', 'view');
        canvas_element.setAttribute('height', '600');
        canvas_element.setAttribute('width', '600');
        
        document.getElementById('modal-body').append(canvas_element);

    var preview = new fabric.Canvas('view');

    var cw1 = cw;
    var cw2 = 580;
    var ch1 = ch;
    var ch2 = 580;

    var wratio = (cw2 / cw1);
    var hratio = (ch2 / ch1);


    var data = JSON.stringify(can);
    var data1 = JSON.parse(data);
    var type = data1.objects;

    console.log(data1);
    console.log(type.length);

      for (var i = type.length - 1; i >= 0; i--) {
        if((type[i].type)=="image"){

          if((type[i].src).match('.png') && (type[i].name).match('video')){
           video(type[i], wratio, hratio, type[i].weblink);
           
          }else if((type[i].name).match('youtube') && (type[i].src).match('youtube')){
            console.log('youtube');
            youtube(type[i].weblink, type[i], wratio, hratio);

          }else {
            console.log('images only');
             image(type[i], wratio, hratio, preview);
          }


        }else if((type[i].type)==="i-text"){ 
        
         var text = new fabric.IText(type[i].text, {
            fill:type[i].fill,
            fontSize:(type[i].fontSize * wratio),
            fontFamily:type[i].fontFamily,
            left:(type[i].left * wratio),
            top:(type[i].top * hratio),
            visible:true,
          });

        preview.add(text);
        can.setActiveObject(text);
        preview.renderAll();

      } else if((type[i].type)=="rect"){

         rectangle(type[i], wratio, hratio, preview);           


      }else if((type[i].type)=="triangle"){

          triangle(type[i], wratio, hratio, preview);

      }else if((type[i].type)=="circle"){

          circle(type[i], wratio, hratio, preview);
          
      }else if((type[i].type) ==="text"){

        if((type[i].name).match('Date')){
          date()
           
        }else if((type[i].name).match('Time')){
          time();

        }else {
          dateTime();
        }        
      }

    }
    $('#show').on('hidden.bs.modal', function(e){

       // var $video = $(e.target).find("video");
       //  $video.each(function(index, video){
       //    $(video).attr("src", $(video).attr("src"));
       //  });

       $('#modal-body').empty();

      // if($('video').length > 0)
      // {
      //   console.log("contains videos");
      //   $("video").each(function () { this.pause() });  
      // }
    })

  });
  

        //delete object 
$('#trash').on('click', function(evt){
    deleteObjects();
});


$('#copy').on('click', function(evt){
    var activeObject = can.getActiveObject();
    if(activeObject){
        can.getActiveObject().clone(function(cloned){
        _clipboard = cloned;

      });

    }else{
        alert('Please select an object');
    }
});

$('#paste').on('click', function(evt){
  _clipboard.clone(function(clonedObj) {
  can.discardActiveObject();
  clonedObj.set({
    left: clonedObj.left + 20,
    top: clonedObj.top + 20,
    evented: true,
  });

  // can.add(clonedObj);
  // can.setActiveObject(clonedObj);
  // can.requestRenderAll();
  });
});

var name = "Irena" ;  // global
var  age = 25;  // global
function greet() {
 return(`Hello, ${name}!` );
}
function getBirthYear() {
 return new Date(). getFullYear() - age;
}
// alert(getBirthYear());
// alert(greet());

// (function(){
//     alert('boko haram');
// })();


</script>

@endsection