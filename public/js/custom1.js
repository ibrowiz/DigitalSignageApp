
function Video(src){

    var video = $('<video> ', {
        id: 'resources',
        src: src ,
        type: 'video/mp4',
        controls: true
    });

     video.appendTo($('#trial'));

}

function youtube(src, object, wratio, hratio){

  var url = youtube_parser(src);

    var video = $('<iframe> ', {
        id: 'youtube',
        src: 'https://www.youtube.com/embed/'+url  +'?autoplay=1',//"{{ url('webcontent?source=')}}"+src,
        width:object.width*wratio,
        height:object.height*hratio,
    });

    var bar = video.appendTo($('#modal-body'));
    bar.css({'position' : 'absolute', 'left': parseInt(object.left*wratio), 'top' : parseInt(object.top*hratio), 'z-index' : '1000'});

}



  //youtube Parser
 function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}


  // website display
function weblink(url, tag, content_id){

  fabric.Image.fromURL(url, function(oImg) {

      oImg.set({'left':350});
      oImg.set({'top':80});
      oImg.set({'width':400});
      oImg.set({'height':300});
      // oImg.set({'crossOrigin':'anonymous'});

      oImg.toObject = (function(toObject) {
        return function() {
          return fabric.util.object.extend(toObject.call(this), {
            name: 'Web',
            weblink:url,
            tag:tag,
            content_id:content_id,
          });
        };
      })(oImg.toObject);

  can.add(oImg);
  can.renderAll();
  });
}

function widget(img){

  fabric.Image.fromURL(img.src, function(oImg) {
    oImg.set({'left':450});
    oImg.set({'top':50});
    // oImg.crossOrigin = "Anonymous";
    oImg.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'widget',
        weblink:img.src,
        tag:'',
        content_id:0,
      });
    };
  })(oImg.toObject);
    can.add(oImg);
  });//, {crossOrigin:'Anonymous'});


  // fabric.util.loadImage(img.src, function(img) {
  //   var imgObj = new fabric.Image(img);
  //   imgObj.set({left: 200, top: 300});
  //   can.add(imgObj);

  //   console.log(can.getObjects());
  // }, null, {crossOrigin: 'Anonymous'});

}



// drageable ellement
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}    

//webpages link

  function web(src){

    var video = $('<iframe> ', {
        id: 'resources',
        src: src,//"{{ url('webcontent?source=')}}"+src,
        width:420,
        height:300,
    });

    var bar = video.appendTo($('#webpage'));
    bar.css({'position' : 'absolute', 'left':220, 'top' :100, 'cursor': 'move', 'z-index' : '1000'});

}

 function deleteObjects(){
    var activeObject = can.getActiveObject();
    //var activeGroup = can.getActiveGroup();
    if (activeObject) {
        if (confirm('Are you sure?')) {
            can.remove(activeObject);
            can.renderAll();
        }
    } 
    else{
        alert('nothing to delete');
        can.renderAll();

    } 
}
// set object properties function

function setColor(color){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
    can.getActiveObject().set('fill', color);
    can.renderAll();
  }
}

 function setWidth(size){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
    can.getActiveObject().set('width', size);
    can.renderAll();
  }
}

 function setHeight(size){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
    can.getActiveObject().set('height', size);
    can.renderAll();
  }
}

function setRadius(Radius){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
    can.getActiveObject().set('radius', Radius);
    can.renderAll();
  }

}


function setFont(font){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
    can.getActiveObject().set('fontFamily', font);
    can.renderAll();
  }
}

function setFontStyle(font){
  var acttiveObject = can.getActiveObject();
  if(acttiveObject){
      can.getActiveObject().set('fontStyle', font);
      can.renderAll();
  }
}

function setSize(size){
    var acttiveObject = can.getActiveObject();
    if(acttiveObject){
        can.getActiveObject().set('fontSize', size);
        can.renderAll();
    }
}

function setOutline(color){
    var acttiveObject = can.getActiveObject();
    if(acttiveObject){
        can.getActiveObject().set('stroke', color);
        can.renderAll();
    }
}

function setStrokeWidth(size){
    var acttiveObject = can.getActiveObject();
    if(acttiveObject){
        can.getActiveObject().set('strokeWidth', size);
        can.renderAll();
    }
}

function setScaleX(size){
    var acttiveObject = can.getActiveObject();
    if(acttiveObject){
        can.getActiveObject().set('scaleX', size);
        can.renderAll();
    }
}

function setScaleY(size){
    var acttiveObject = can.getActiveObject();
    if(acttiveObject){
        can.getActiveObject().set('scaleY', size);
        can.renderAll();
    }
}

//font family
        $('#font').on('change', function(e){
            var font = (this.value);
            setFont(font);
            can.renderAll();
            
        });
        // fontStyle
        $('#fontStyle').on('change', function(e){
            var font = (this.value);
            setFontStyle(font);
            can.renderAll();
            
        });

        //font Size
        $('#fontSize').on('change', function(e){
            var size = (this.value);
            setSize(size);
            can.renderAll();
            
        });

        // fill color 
         $('.fill').on('change', function(e){
            var color = (this.value);
            console.log(color);
            setColor(color);
            can.renderAll();
            
        });

         // stroke color
         $('.stroke').on('change', function(e){
            var color = (this.value);
            console.log(color);
            setOutline(color);
            can.renderAll();
            
        });

        // strokeWidth 
         $('.strokeWidth').on('change', function(e){
            var width = Number(this.value);
            setStrokeWidth(width);
            can.renderAll();
            
        });

         // Width 
         $('.width').on('change', function(e){
            var width = Number(this.value);
            setWidth(width);
            can.renderAll();
            
        });

        // Height 
         $('.height').on('change', function(e){
            var height = Number(this.value);
            setHeight(height);
            can.renderAll();
            
        });

         //font family
        $('#radius').on('change', function(e){
            var radius = Number(this.value);
            setRadius(radius);
            can.renderAll();
            
        });

        function sendBackwards(obj) {
          var objects = can._objects,
          idx = objects.indexOf(obj);
          if (idx !== 0) {
            fabric.util.removeFromArray(objects, obj);
            objects.splice(idx-1, 0, obj);
            can.renderAll();
          }
      }


      function bringForward(obj) {
        var objects = can._objects,
        idx = objects.indexOf(obj);
        if (idx !== objects.length-1) {
          fabric.util.removeFromArray(objects, obj);
          objects.splice(idx+1, 0, obj);
          can.renderAll();
        }
      }

function showSetting(id){

    $('.current-tool').children().hide();
    $('#'+id).show();
}



function rectangle(object, wratio, hratio, canvas){
  object.left = (object.left * wratio);
  object.top = (object.top * hratio);
  object.scaleX = (object.scaleX * wratio);
  object.scaleY = (object.scaleY * hratio);
  var rect = new fabric.Rect(object, function (a) {
  });
  rect.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: object.name,
          weblink:object.weblink,
          tag:object.tag,
          content_id:object.content_id,
        });
      };
    })(rect.toObject);
  canvas.add(rect);
  canvas.sendToBack(rect);


}

function triangle(object, wratio, hratio, canvas){
  object.left = (object.left * wratio);
  object.top = (object.top * hratio);
  object.scaleX = (object.scaleX * wratio);
  object.scaleY = (object.scaleY * hratio);
  var tria = new fabric.Triangle(object, function(a){
  });
   tria.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: object.name,
          weblink:object.weblink,
          tag:object.tag,
          content_id:object.content_id,
        });
      };
    })(tria.toObject);
  canvas.add(tria);
  canvas.sendToBack(tria);

}

function circle(object, wratio, hratio, canvas){
  object.left = (object.left * wratio);
  object.top = (object.top * hratio);
  object.scaleX = (object.scaleX * wratio);
  object.scaleY = (object.scaleY * hratio);
  var circle = new fabric.Circle(object, function(a){
  });
  circle.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: object.name,
          weblink:object.weblink,
          tag:object.tag,
          content_id:object.content_id,
        });
      };
    })(circle.toObject);
  canvas.add(circle);
  canvas.sendToBack(circle);

}

function video(object, wratio, hratio, src){
    object.left = (object.left * wratio);
    object.top = (object.top * hratio);
    object.scaleX = (object.scaleX * wratio);
    object.scaleY = (object.scaleY * hratio);
    var width = parseInt(object.width  * object.scaleX);
    var height = parseInt(object.height * object.scaleY);

     var video = $('<video> ', {
        id: 'resources',
        src: src ,
        type: 'video/mp4',
        left:object.left,
        top:object.top,
        width: parseInt( width ),
        height: parseInt( height ),
        autoplay: true,
        preload:true,
        muted:true
    });

    var bar = video.appendTo($('#modal-body'));
    bar.css({'position' : 'absolute', 'left': parseInt(object.left), 'top' : parseInt(object.top), 'z-index' : '1000'});
}

function audio(object, wratio, hratio, src, canvas){
  object.left = (object.left * wratio);
  object.top = (object.top * hratio);
  object.scaleX = (object.scaleX * wratio);
  object.scaleY = (object.scaleY * hratio);
  var video11 = document.getElementById('video');
  var width = parseInt(object.width  * object.scaleX);
  var height = parseInt(object.height * object.scaleY);
  video11.src = src;
  var vplay = new fabric.Image(video11, {
    left: object.left,
    top: object.top,
    angle: 0,
    width: 1900,
    height: 900,
    scaleX:(0.3),
    scaleY:(0.3)
  });
  canvas.add(vplay);
   vplay.getElement().play();
  fabric.util.requestAnimFrame(function render() {
      canvas.renderAll();
      fabric.util.requestAnimFrame(render);
  });
}      

function image(object, wratio, hratio, canvas){
    object.left = (object.left * wratio);
    object.top = (object.top * hratio);
    object.scaleX = (object.scaleX * wratio);
    object.scaleY = (object.scaleY * hratio);
    return fabric.Image.fromURL(object.src, function(e){
      e.set(object);
      e.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
         name: object.name,
         weblink:object.weblink,
         tag:object.tag,
         content_id:object.content_id,
        });
      };
    })(e.toObject);

      canvas.add(e);
    });
}

function imgResource(image, canvas, tag, content_id){
  fabric.Image.fromURL(image, function(oImg) {

    oImg.set({'left':150});
    oImg.set({'top':50});

    oImg.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: 'Image',
          weblink:image,
          content_id:content_id,
          tag: tag,

        });
      };
  })(oImg.toObject);

  canvas.add(oImg);
  });
}

function vidResource(video, load, canvas, tag, content_id){

  console.log(load);
  fabric.Image.fromURL(load, function(oImg) {

    oImg.set({'left':150});
    oImg.set({'top':50});
    oImg.toObject = (function(toObject) {
      return function() {
        return fabric.util.object.extend(toObject.call(this), {
          name: 'video',
          weblink:video,
          tag:tag,
          content_id:content_id,
        });
      };
    })(oImg.toObject);

    canvas.add(oImg);
  });
}

// Basic shape Resctangle
function rect (){
  var rect = new fabric.Rect({
    left: 250,
    top: 250,
    fill: '',
    width: 50,
    height: 50,
    strokeWidth: 1,
    stroke:'black',

  });

  rect.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'shape',
        weblink:'',
        content_id:0,
        tag:'',
      });
    };
  })(rect.toObject);

  can.add( rect);
  can.setActiveObject(rect);
  can.renderAll();
}

function tria(){
  var tria = new fabric.Triangle({
    left: 250,
    top: 150,
    fill: '',
    width:50,
    height: 50,
    strokeWidth: 1,
    stroke:'black',
  });

  tria.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'shape',
        weblink:'',
        content_id:0,
        tag:'',
      });
    };
  })(tria.toObject);

  can.add( tria);
  can.setActiveObject(tria);
  can.renderAll();
}

function circ(){
  var circle = new fabric.Circle({

    left: 250,
    top: 50,
    fill: '',
    radius: 50,
    strokeWidth: 1,
    stroke:'black',
  });

  circle.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'shape',
        weblink: '',
        content_id:0,
        tag:'',
      });
    };
  })(circle.toObject);

  can.add( circle);
  can.setActiveObject(circle);
  can.renderAll();
}

function itext(){
  var text = new fabric.IText('Add your Text', 
  { left: 250, top: 350, id:'Itext' });

 text.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'Itext',
        weblink:'Basic',
        content_id:0,
        tag:'',
      });
    };
  })(text.toObject);
  can.add(text); 
  can.setActiveObject(text);
  can.renderAll();  
}

function time(canvas, top, left){
  var top = top || 25;
  var left = left || 35;
  var d = new Date(); 
  var h = (d.getHours()<10?'0':'') + d.getHours().toString();
  var m = (d.getMinutes()<10?'0':'') + d.getMinutes().toString();
  var s = (d.getSeconds()<10?'0':'') + d.getSeconds().toString(); 
  var time = h +":" + m + ":"+ s;
  var day = new fabric.Text(time, {
      top:top,
      left:left,
  });
  day.toObject = (function(toObject) {
        return function() {
          return fabric.util.object.extend(toObject.call(this), {
            name: 'Time',
            weblink:'Time',
            content_id:0,
            tag:'',
          });
        };
      })(day.toObject);
  canvas.add(day);
  canvas.renderAll();
}

function dateTime(canvas, top, left){

  var top = top || 150;
  var left = left || 55;
  var today = new Date();
  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();


  var date =(today.getMonth()+1).toString()+'/'+today.getDate().toString()+ '/' + today.getFullYear().toString();
  var dtime = today.getHours().toString() + ":" + today.getMinutes().toString() + ":" + today.getSeconds().toString();
  var time = date+ '\n ' +dtime;

  var day = new fabric.Text(time, {
   top:top,
   left:left,
  });

  day.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'both',
        weblink:'Date/Time',
        content_id:0,
          tag:'' ,
      });
    };
  })(day.toObject);

  canvas.add(day);
  canvas.renderAll();
}

function date(canvas, top, left){
  var top = top || 80;
  var left = left || 15;
  var currentTime = new Date()
  var month = (currentTime.getMonth() + 1).toString();
  var day = currentTime.getDate().toString();
  var year = currentTime.getFullYear().toString();
  var time = month + "/" +day +"/"+year;

  var day = new fabric.Text(time, {
      top:top,
      left:left
  });

  day.toObject = (function(toObject) {
    return function() {
      return fabric.util.object.extend(toObject.call(this), {
        name: 'Date',
        weblink:'Date',
        content_id:0,
        tag:'',
      });
    };
  })(day.toObject);
  canvas.add(day);
  canvas.renderAll();

}

$('#aspect_ratio').on('change', function(e){
      
    var orientation = (this.value);
    if(orientation=='standard'){
        // can.setHeight(700);
        // can.setWidth(1000);
        can.setDimensions({width:(window.innerWidth -550), height: window.innerHeight - 150});
        can.renderAll();
    }
    else{
        // can.setHeight(700);
        // can.setWidth(1000);
        can.setDimensions({width:(window.innerWidth -550), height: window.innerHeight - 150});
        can.renderAll();
    }
  });

  $('#bcolor').on('change', function(e){
      var orientation = (this.value);      
      can.setBackgroundColor((this.value));
      can.renderAll();
  });

  $('#orientation').on('change', function(e){
      
      var orientation = (this.value);
      if(orientation==0){
          // can.setHeight(700 );
          // can.setWidth(1000);
          can.setDimensions({width:(window.innerWidth -550), height: window.innerHeight - 150});
          can.renderAll();
      }
      else{
          // can.setHeight(1000);
          // can.setWidth(700);
          can.setDimensions({height:(window.innerWidth -550), width: window.innerHeight - 150});
          can.renderAll();
      }
  });