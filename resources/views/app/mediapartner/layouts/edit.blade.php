
@include('include.header')
<div class="container">

	<div class="row">
		<div class="col-md-10 object" style="background-color: #F8F8F8; align-items: center; padding-top: 10px; padding-bottom: 10px;">
			
			<div class="col-md-7">
				<div class="col-md-2 text">

					<span type="button" class="btn btn-default text" id="text">Text</span>
					
				</div>
				<div class="col-md-2">

						<div class="shape">
							
							<span type="button" class="btn btn-default click-shape" data-shape='shapes' > Shapes </span>

							<div class="shape-properties hidden ">
								
								<div>
									<button type="button" class="btn btn-default object action" action='rectangle' > Rectangle </button>
								</div><br>
								<div>
									<button type="button" class="btn btn-default object action" action='circle' > Circle </button>
								</div><br>
								<div>
									<button type="button" class="btn btn-default object action" action='triangle' > Triangle </button>
								</div>

							</div>

						</div>					
				</div>




				<div class="col-md-2">
					<div class="image">

					    <span type="button" class="btn btn-default img" id="img" data-toggle="modal" data-target="#modal">Image</span>

					</div>
		
				</div>


				<div class="col-md-2 text">
					<label class="myFile">

					    <span type="button" class="btn btn-default">Image</span>

					    <input type="file" id="file" />

					</label>
		
				</div>
				<div class="col-md-2 text">
					
						<label class="video">
			                <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
			                    <input type="file" name="file" id="file">
			                    <input type="submit" value="video" name="submit">
			                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
			                </form>
						</label>
					
				</div>
				<div class="col-md-2">
					<div class="shape">
								
								<span type="button" class="btn btn-default click-shape" data-shape='widget' > Weather </span>

								<div class="shape-properties hidden">

									<div class="input-group input-xs">
										<label class="input-group-addon input-xs">City</label>
										 <select id="city">
										<option value="Lagos">Lagos</option>
								        <option value="Abuja">Abuja</option>
								        <option value="Abeokuta">Abeokuta</option>
								        <option value="Ibadan">Ibadan</option>
								         </select>
									</div>

									<div class="input-group">
										<button type="button" class="btn btn-primary action" action='cancel'>X</button>
										<button type="button" class="btn btn-primary action" action='ok'>Ok</button>
									</div>

								</div>
					</div>
				</div>
				
			</div><!-- end col-md-5 -->

			<div class="col-md-5" >
				<div class="text">
					<div class="txt_properties hidden">
						<label for="font-family" >Font:</label>
					      <select id="font-family">
					        <option value="arial">Arial</option>
					        <option value="helvetica" selected>Helvetica</option>
					        <option value="myriad pro">Myriad Pro</option>
					        <option value="algerian">Algerian</option>
					        <option value="verdana">Verdana</option>
					        <option value="georgia">Georgia</option>
					        <option value="courier">Courier</option>
					        <option value="comic sans ms">Comic Sans MS</option>
					        <option value="impact">Impact</option>
					        <option value="monaco">Monaco</option>
					        <option value="optima">Optima</option>
					        <option value="hoefler text">Hoefler Text</option>
					        <option value="castellar">Castellar</option>
					        <option value="Bookman Old Style">Bookman Old Style</option>
					      </select>

					      <label for="font-size" style="display:inline-block">Font size:</label>
					      <select id="font-size">
					        <option value="10">10</option>
					        <option value="12" selected>12</option>
					        <option value="14">14</option>
					        <option value="18">18</option>
					        <option value="22">20</option>
					        <option value="24">24</option>
					        <option value="28">28</option>
					        <option value="32">32</option>
					        <option value="48">48</option>
					        <option value="60">60</option>
					        <option value="78">78</option>
					        <option value="80">80</option>
					        <option value="90">90</option>
					        <option value="100">100</option>
					      </select>

					      <!-- <label for="text-align" style="display:inline-block">Text align:</label>
					      <select id="text-align">
					        <option value="left">Left</option>
					        <option value="center">Center</option>
					        <option value="right">Right</option>
					        <option value="justify">Justify</option>
					      </select> -->
						
					</div>
				</div>
				
				
			</div><!-- class-text -->
			
		</div><!-- col-md-7 -->
	
	</div>	<!-- end row -->
	<div class="row">
		<div class="col-md-2">

			<form class="form-horizontal" id="form" method="POST" action="#">
					{{csrf_field()}}
				<fieldset>

				  	<h5>Create Layout</h5>
				  	<div class="form-group">
						<label class="control-label"> Layout Name </label>
						<input type="text" class="form-control" id="title" name="title">
					</div>
					<div class="form-group">
						<label class="control-label"> Background Color </label>
						<input type="color" class="form-control color-prop" id="color">
					</div>
					<div class="form-group">
					<label class="control-label">Aspect Ratio</label>
	                <select class="form-control" id="aspect_ratio" name="aspect_ratio">
	                    <option value="0" >Standard</option>
	                    <option value="1" >WideScreen</option>
	                </select>
	            	</div>
	            	<div class="form-group">
						<label class="control-label"> Layout Duration(S) </label>
						<input type="text" class="form-control" id="name" name="name" value="60">
					</div>
	            	<div class="form-group">
					<label class="control-label">Orientation</label>
	                <select class="form-control" id="orientation" name="orientation">
	                    <option value="0">Landscape</option>
	                    <option value="1" >Portrait</option>
	                </select>
	            	</div>

					<div class="object_container">
					
					</div>

				</fieldset>

			</form>
			<!-- weather widget start -->
			<div class="weather hidden">
				<a target="_blank" href="http://www.booked.net/weather/abeokuta-w364843"><img src="https://w.bookcdn.com/weather/picture/1_w364843_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Abeokuta" /></a>
			</div>

			<div class="weather hidden">
				<a target="_blank" href="http://www.booked.net/weather/abuja-9871"><img src="https://w.bookcdn.com/weather/picture/1_9871_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=w209&anc_id=61514"  alt="booked.net" id="Abuja" />
			</div>

			<div class="weather hidden">
				<a target="_blank" href="http://www.booked.net/weather/lagos-14299"><img src="https://w.bookcdn.com/weather/picture/1_14299_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Lagos" /></a>
			</div>

			<div class="weather hidden">
				<a target="_blank" href="http://www.booked.net/weather/ibadan-w656040"><img src="https://w.bookcdn.com/weather/picture/1_w656040_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Ibadan" /></a>
			</div>
			<!-- weather widget ends-->

			
		</div>

		<div class="col-md-8 col-md-offset-1">
			<br>
			<div class = "bar"> 
				<div class="properties hidden">
					<button type="button" class="btn btn-xs" id="delete">Delete</button>

					<button type="button" class="btn btn-xs click-shape" data-shape='edit' > Fill </button>

							<div class="shape-properties hidden ">
								
								<div class="input-group input-xs">
									<label class="input-group-addon input-xs">Color</label><input type="color" class="form-control input-xs color-prop">
								</div>

								<div class="input-group">
									<button type="button" class="btn btn-primary action" action='cancel'>X</button>
									<button type="button" class="btn btn-primary action" action='ok'>Ok</button>
								</div>
							</div>

					<button type="button" class="btn btn-xs outline" data-shape='outline' > Outline </button>

							<div class="outline-properties hidden ">
								
								<div class="input-group input-xs">
									<label class="input-group-addon input-xs">Color</label><input type="color" class="form-control input-xs outline">
								</div>

								<div class="input-group">
									<button type="button" class="btn btn-primary action" action='cancel'>X</button>
									<button type="button" class="btn btn-primary action" action='ok'>Ok</button>
								</div>
							</div>
				</div>
			</div>

			<canvas id="draw" width="642" height="482" style="border: 2px solid grey; "> </canvas>
			<br>

			<button class="btn btn-primary" id="save-canvas" type="button" >Save</button>
			<button class="btn btn-warning" id="preview" type="button" >Preview</button>
			
			


		</div><!--end col-md 8 -->

	</div><!-- end row -->
</div><!--container-->
<!-- Modal -->
	<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		   <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Select Image </h4>
		        <div class="" style="background-color:#C0C0f0 ">

		        	<button type="button" class="active btn btn-info">
		        		MyFiles
		        	</button>

		        	<button type="button" class="btn btn-info">
		        		Public Files
		        		<input type="file" name="public">
		        	</button>

		        </div>
		      </div>
		      <div class="modal-body">

		        <!-- <p><img src="http://your.url/img/picture.jpg"></p> -->

		      </div>

		      <div class="modal-footer">

		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-success add" data-dismiss="modal">Add</button>

		      </div>

		</div>

	  </div>
	</div>
	
 <div id="trial">

    <video  controls="true" buffered="0" id="video" class="video hidden">
       
    </video>

    <div id="webpage">

    </div>
  </div>



<script type="text/javascript">

	//draw canvas
	var can = new fabric.Canvas('draw');

	// can.loadFromJSON(<?= json_encode($layout->screen) ?>);

	var obj = JSON.parse((<?= json_encode($layout->screen) ?>));
	var type = obj.objects;

for (var i = type.length - 1; i >= 0; i--) {
              if((type[i].type)=="image"){

                if((type[i].src).match('.png') || (type[i].src).match('.jpg') ||(type[i].src).match('.jpeg')||(type[i].src).match('.gif')){
                  image(type[i], 1, 1,can);
                 
                }else if((type[i].src).match('.mp4') || (type[i].src).match('.mp3')|| (type[i].src).match('www.youtube')){

                  audio(type[i], 1, 1, type[i].src,  can);
                }


              }else if((type[i].type)=="i-text"){ 
              
               var text = new fabric.IText(type[i].text, {
                  fill:type[i].fill,
                  fontSize:(type[i].fontSize),
                  fontFamily:type[i].fontFamily,
                  left:(type[i].left),
                  top:(type[i].top),

                });
                can.add(text);

            } else if((type[i].type)=="rect"){

               rectangle(type[i], 1, 1, can);           


            }else if((type[i].type)=="triangle"){

                triangle(type[i], 1, 1, can);

            }else if((type[i].type)=="circle"){

                circle(type[i], 1, 1, can);

            }

          } //ends here


	// shape properties display for  drawing

	$('.modal-footer').on('click', 'button.add', function(e){
		console.log('add');
	})





	$('.shape').on('click', 'span.click-shape', function(e){

		var shapeProp = $(this).parent('.shape').find('.shape-properties');
		shapeProp.toggleClass('hidden');
		
		
	});
	//shape drawing 'rectangle', 'circle', 'triangle';
	$('.shape').on('click', '.object', function(e){


		var action = $(this).attr('action');

		

			switch(action){

				case 'rectangle': 
					var rect = new fabric.Rect({

				    left: 50,

				    top: 20,

				    fill: '',

				    width: 50,

				    height: 50,

				    strokeWidth: 1,
				    stroke:'black',

					});

					can.add( rect);

					var shapeProp = $(this).parent('div').parent('div.shape-properties');

					shapeProp.addClass('hidden');

				break;

				case 'triangle': 
					var tria = new fabric.Triangle({

				    left: 100,

				    top: 40,

				    fill: '',

				    width:50,

				    height: 50,

				    strokeWidth: 1,

				    stroke:'black',

					});

					can.add( tria);

					var shapeProp = $(this).parent('div').parent('div.shape-properties');

					shapeProp.addClass('hidden');


					// $('.object_container').append(list);

				break;

				case 'circle': 
					var circle = new fabric.Circle({

				    left: 150,

				    top: 80,

				    fill: '',


				    radius: 50,

				    strokeWidth: 1,

				    stroke:'black',

					});

					can.add( circle);

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
		var text = new fabric.IText('Add your Text', 
				{ left: 250, top: 350, id:'Itext' });
	});



	$('.object_container').on('click', '.list_element', function(){
			// $('.object_container>div').removeClass('selected');
			// $('.object').removeClass('selected');
			$(this).addClass('selected');
			// var type = $(this).data('object');
			// $('.object-'+type).addClass('selected');
		});

		//widget upload
	
	$('.shape').on('click', '.action', function(e){


		var action = $(this).attr('action');
		
		if(action == 'cancel'){
			var shapeProp = $(this).parent('div').parent('div.shape-properties');

			shapeProp.addClass('hidden');

		}else if(action == 'ok'){
			var result = $(this).parent('div').parent('div.shape-properties').find('#city');
			//var $shape = $(this).parent('div').parent('div.shape-properties').parent('.shape').find('.click-shape');
			var city = result.val();

			console.log(city);
			if(city === 'Abeokuta'){
				var img = document.getElementById('Abeokuta');
			
			}else if(city === 'Abuja'){
				var img = document.getElementById('Abuja');
				
			}else if(city === 'Lagos'){
				var img = document.getElementById('Lagos');
				
			}else if(city === 'Ibadan'){
				var img = document.getElementById('Ibadan');
			
			}


				fabric.Image.fromURL(img.src, function(oImg) {
						oImg.set({'left':450});
						    oImg.set({'top':50});
					  can.add(oImg);
				});

				var shapeProp = $(this).parent('div').parent('div.shape-properties');

				shapeProp.addClass('hidden');

		}

		});
			// object selected on canvas properties display
		can.on('object:selected', function(e) {
			e.target.bringToFront();
			var activeObject = can.getActiveObject();
			var objectType = can.getActiveObject().get('type');
			var bar = $('.properties');
			bar.css({'position' : 'absolute', 'left': parseInt(activeObject.left)+30 + 'px', 'top' : parseInt(activeObject.top) -30 +'px', 'z-index' : '1000'});
			bar.removeClass('hidden');
			var shapeProp = $('.properties').children('button');

			console.log(objectType);

			if((objectType==='text')||(objectType==='i-text')){
				var text = $('.txt_properties');
				text.removeClass('hidden');
			}
				
		});

		can.on('before:selection:cleared', function() {
				var bar = $('.properties');
				bar.addClass('hidden');
				var text = $('.txt_properties');
			text.addClass('hidden');
		});


		$('#aspect_ratio').on('change', function(e){
			
			var orientation = (this.value);
			if(orientation==0){
				can.setHeight(482);
				can.setWidth(642);
				can.renderAll();
			}
			else{
				can.setHeight(362);
				can.setWidth(642);
				can.renderAll();
			}
		});

		$('#color').on('change', function(e){
			var orientation = (this.value);
			
				can.setBackgroundColor((this.value));
				 can.renderAll();
		});

		$('#orientation').on('change', function(e){
			
			var orientation = (this.value);
			if(orientation==0){
				can.setHeight(642);
				can.setWidth(482);
				can.renderAll();
			}
			else{
				can.setHeight(642);
				can.setWidth(362);
				can.renderAll();
			}
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


		$('#save-canvas').on('click', function(evt){

			var token = "{{csrf_token()}}";
			var url = "{{ url('save-canvas')}}";
			var title = document.getElementById('title').value;
			var aspect_ratio = document.getElementById('aspect_ratio').value

			console.log(title);

			$.ajax({
				type: 'post',
				url: url, 
				data : { '_token': token, 'canvas' : JSON.stringify(can), 'title':title, 'aspect_ratio':aspect_ratio },
				success:function(data){
					console.log(JSON.stringify(can));
					// console.log(data);
				}

			});

		});

		//preview
		$('#preview').on('click', function(evt){

			$('#draw').get(0).toBlob(function(blob){
				saveAs(blob,'mycanvas');
			})
		});

		//delete object 
		$('#delete').on('click', function(evt){
			deleteObjects();
		});
		
		$('#font-family').on('change', function(e){
			var font = (this.value);
			setFont(font);
			can.renderAll();
			
		});

		//font Size
		$('#font-size').on('change', function(e){
			var size = (this.value);
			setSize(size);
			can.renderAll();
			
		});


		//delet object from canvas

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
		//oya

		function setColor(color){
			var acttiveObject = can.getActiveObject();
				if(acttiveObject){
					can.getActiveObject().set('fill', color);
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

		document.getElementById('file').onchange = function handleImage(e) {
		var reader = new FileReader();
	 	reader.onload = function (event){
	    var imgObj = new Image();
	    imgObj.src = event.target.result;
	    imgObj.onload = function () {
	      var image = new fabric.Image(imgObj);
	      can.centerObject(image);
	      can.add(image);
	      can.renderAll();
	    }
	  }
	  reader.readAsDataURL(e.target.files[0]);
}

</script>



@include('include.footer')