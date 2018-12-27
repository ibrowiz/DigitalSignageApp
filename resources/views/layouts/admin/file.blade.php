<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from jesus.gallery/everest/basic-template.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:45:11 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Everest Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<title>Layout Designer</title>
		
		<!-- Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="{{asset('css/animate.css')}}" rel="stylesheet" media="screen">

		<!-- Alertify CSS -->
		<link href="{{asset('css/alertify/alertify.core.css')}}" rel="stylesheet">
		<link href="{{asset('css/alertify/alertify.default.css')}}" rel="stylesheet">

		<!-- Main CSS -->
		<link href="{{asset('css/main.css')}}" rel="stylesheet" media="screen">

		<!-- Font Awesome -->
		<link href="{{asset('fonts/glyphicons-halflings-regular.eot')}}" rel="stylesheet">

		<link href="{{asset('css/style.css')}}" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">
			.right-sidebar { top: 0; }

			/*aside#sidebar { top: 0; width: 500px; }*/

			.dashboard-wrapper { margin-left: 50px; }

			.main-container { border-right: 0; }

			#menu a { height: 40px; }
		</style>

	</head>  

	<body>
		<aside id="sidebar">
			<!-- Menu start -->
			<div id='menu'>
				<ul>
					<li>
						<a href="{{URL::to('admin/dashboard')}}">
                         <button type="button" class="btn btn-md glyphicon glyphicon-home" title="Home"></button>
						</a>
					</li><br>
					<li>
						<a href="#">
                           <button type="button" class="text btn btn-md glyphicon glyphicon-font" id="text" title="Text"></button>
						</a>
					</li><br>
					<li>
						<a href="#" class="shape">                                            
                       		<button class="click-shape  btn btn-md glyphicon glyphicon-folder-close" data-shape='shapes' title="Basic Shapes"> </button>
	                        <div class="shape-properties hidden ">                                                
		                        <div>
		                            <span class="btn btn-default object action" action='rectangle' > <span class="glyphicon glyphicon-square"> </span> Rectangle </span>
		                        </div><br>
		                        <div>
		                            <span type="button" class="btn btn-default object action" action='circle' > Circle </span>
		                        </div><br>
		                        <div>
		                            <span type="button" class="btn btn-default object action" action='triangle' > Triangle </span>
		                        </div>
		                    </div>                                     
                         </a>  						
					</li><br>
					<li>
						<a href="#" class="image">
                            <button class="img btn btn-md glyphicon glyphicon-picture" id="img" data-toggle="modal" data-target="#modal" title="Resources" /></button>
                        </a>
					</li><br>
					<li>
						<a href="#" class="shape">                                                
                            <button class="click-shape btn btn-md glyphicon glyphicon-cloud " data-shape='widget' title="Weather Widget" /></button>
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
                                    <span class="btn btn-primary action" action='cancel'>X</span>
                                    <span class="btn btn-primary action" action='ok'>Ok</span>
                                </div>
                            </div>
                        </a>
					</li><br>
					<li>
						<a href="#" class="text">        
                            <button class="btn btn-md glyphicon glyphicon-film" data-toggle="modal" data-target="#myModal" title="YouTube Link" /></button>
                            <div>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                	<form>
	                                  <div class="modal-dialog">
	                                    <div class="modal-content">
	                                      <div class="modal-header">
	                                        <h4 class="modal-title">Add a YouTube video</h4>
	                                      </div>
	                                      <div class="modal-body form-group" id="modal-youtube">
	                                        <label >Youtube Url:</label>
	                                        <input type="text" name="url" id="url" class="form-control"><br>
	                                        <label>  Please Tag Your Video
		                                        <select id="content" class="form-control">                
									                @foreach($contents as $content)
									                	<option value="{{$content->tag}}" data-content_id="{{$content->content_category_id}}">{{$content->tag}}</option>
									                @endforeach
								              	</select>
							              	</label>
							              	<div class="modal-footer">
	                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                        <button type="button" class="btn btn-default ok" data-dismiss="modal">Ok</button>
	                                    	</div>
	                                      </div>
	                                    </div>
	                                  </div>
                              		</form>
                                </div>
                           </div>                        
                      </a>
					</li><br>
					<li>
						<a href="#" class=" text">

                            <label class="web">
                                <button class="btn btn-md glyphicon glyphicon-list" data-toggle="modal" data-target="#webModal" title="Website" /></button>

                            </label>
                            <div>
                                <!-- Modal -->
                                <div id="webModal" class="modal fade" role="dialog">
                                	<form>
	                                  <div class="modal-dialog">
	                                    <!-- Modal content-->
	                                    <div class="modal-content">
	                                      <div class="modal-header">
	                                        <h4 class="modal-title">Add your Webpage Url</h4>
	                                      </div>
	                                      <div class="modal-body form-group" id="modal-web" >
	                                        <label>Webpage Url:</label>
	                                        <input type="text" name="url" id="url" class="form-control"><br>

	                                        <label>  Please Tag Your Webpage
		                                        <select id="content" class="form-control">                
									                @foreach($contents as $content)
									                	<option value="{{$content->tag}}" data-content_id="{{$content->content_category_id}}">{{$content->tag}}</option>
									                @endforeach
								              	</select>
							              	</label>							              		
	                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                        <button type="button" class="btn btn-default ok" data-dismiss="modal">Ok</button>
	                                      </div>
	                                    </div>
	                                  </div>
                              		</form>
                                </div>
                       		</div>             
                        </a>
					</li><br>
					<li>
						<a href="#" class="date">
                            <div class="shape">                                        
                              <button class="time btn btn-md glyphicon glyphicon-time" title="Date & Time" /></button>
                                <div class="date-properties hidden">
                                    <div>
                                        <span type="button" class="btn btn-default data" action='date' > <span class="glyphicon glyphicon-square"> </span> Date </span>
                                    </div><br>
                                    <div>
                                        <span type="button" class="btn btn-default data" action='time' > <span class="glyphicon glyphicon-square"> </span> Time </span>
                                    </div><br>
                                    <div>
                                        <span type="button" class="btn btn-default data" action='date&time' > <span class="glyphicon glyphicon-square"> </span> Date / Time </span>
                                    </div>
                                </div>
                            </div>
                        </a>                        
					</li>
				</ul>
			</div>
			<!-- Menu End -->
		</aside>

		@yield('left-side')

		 <!-- Dashboard Wrapper starts -->
    <div class="dashboard-wrapper">

        <!-- Top Bar starts -->
        <div class="top-bar">
            <div class="page-title">
                @yield('page-title')
            </div>

        </div>
        <!-- Top Bar ends -->

        <!-- Main Container starts -->
        <div class="main-container" style="min-height: calc(100vh - 125px) !important;">

            <!-- Container fluid Starts -->
            <div class="container-fluid">

                <!-- Spacer starts -->
                <div class="spacer">
                    @yield('content')
                </div>
                <!-- Spacer Ends -->

            </div>
            <!-- Container fluid Ends -->

        </div>
        <!-- Main Container Ends -->

        <!-- Right sidebar starts -->
        <!-- <div class="right-sidebar" style="height: calc(100vh - 125px) !important; overflow-y: auto;" > -->
            
            <!-- Addons starts -->
             @yield('right-side')
            <!-- Addons ends -->

        <!-- </div> -->
        <!-- Right sidebar ends -->

        <!-- Footer starts -->
        <footer>
            Copyright Telvida Int'l Limited 2017
        </footer>
        <!-- Footer ends -->
        <!-- Footer ends -->

    </div>
    <!-- Dashboard Wrapper ends -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{asset('js/jquery.js')}}"></script>

		<script src="{{asset('js/jquery-ui-v1.10.3.js')}}"></script>

		<script src="{{asset('js/jquery-3.1.1.js')}}"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{asset('js/bootstrap.min.js')}}"></script>

		<script src="{{asset('js/fabric.js')}}"></script>


		<!-- Notifications JS -->
		 <script src="{{ asset('js/alertify/alertify.js') }}" type="text/javascript"></script>
		  <script src="{{ asset('js/alertify/alertify-custom.js') }}" type="text/javascript"></script>

		<!-- Custom Index -->
		 <script src="{{ asset('js/custom1.js') }}" type="text/javascript"></script>

		<!-- <script type="text/javascript">
			(function () {
				DRAWER.CANVAS.init();
			})();

			$('document').ready(function() {
				$("#toolbar").click(function(e) { 
				    e.preventDefault();

				    var id = e.target.id;
				    //call the relevant function 
				    
				    DRAWER.TOOLS.delegate(id);
				});
			})
		</script> -->

		 @yield('extra-script')

	</body>

</html>