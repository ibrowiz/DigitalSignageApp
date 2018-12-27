@extends('layouts.mediapartner.file')


@section('left-side')<!-- Right sidebar starts -->
			<div class="right-sidebar">
				<div class="container-fluid" id="toolSettings">

					<section>
						<div class="row">
							<div class="col-md-12 p-0">
								<h4 class="section-heading"><span class="glyphicon glyphicon-cog"></span> General Settings</h4>								
							</div>
						</div>
						<form id="form" method="POST" action="{{url('#')}}">
                                    {{csrf_field()}}
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Layout Name *</label>
										<input type="text" class="form-control" id="title" name="title" required>
									</div>


								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Background</label>
										<input class="form-control" data-name ="bcolor" type="color" id="bcolor" name="bcolor">
										
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Orientation *</label>
										<select class="form-control" id="orientation" name="orientation">
											<option value="0">Landscape</option>
											<option value="1">Potrait</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Aspect Ratio</label>
										<select class="form-control" id="aspect_ratio" name="aspect_ratio">
											<option value="Standard">Standard</option>
											<option value="WideScreen">WideScreen</option>
										</select>
									</div>
								</div>

								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Category *</label>
										<select class="form-control" name="category" id="category">
											<option value="Adult Content">Adults</option>
											<option value="Family">Family</option>
											<option value="Kids & Teens">Kids/Teens</option>
										</select>
									</div>
								</div> -->

								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Content Type *</label>
										<select class="form-control" id="content_type" name="content_type">
                                         @foreach($contents as $content)
                                        	<option value="{{$content->name}}" >{{$content->name}}</option>
                                         @endforeach()                                       
                                    	</select>
									</div>
								</div> -->
							</div>
						</form>
					</section>


					<section class="current-tool">
						<div id="text-tool" style="display: none">
							<div class="row">
								<div class="col-md-12 p-0">
									<h4 class="section-heading">Selected Tool: Text</h4>
								</div>
							</div>

							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Font</label>
											<select class="form-control" data-name ="fontFamily" id="font">
												<option value="arial">Arial</option>
                                                <option value="Patric Hand">Patrick Hand</option>
                                                <option value="myriad pro">Myriad Pro</option>
                                                <option value="algerian">Algerian</option>
                                                <option value="verdana">Verdana</option>
                                                <option value="georgia">Georgia</option>
                                                <option value="courier">Courfa ier</option>
                                                <option value="comic sans ms">Comic Sans MS</option>
                                                <option value="impact">Impact</option>
                                                <option value="monaco">Monaco</option>
                                                <option value="optima">Optima</option>
                                                <option value="hoefler text">Hoefler Text</option>
                                                <option value="Times New Roman">Times New Roman</option>
                                                <option value="Bookman Old Style">Bookman Old Style</option>
                                                <option value="castellar">castellar</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Font Size</label>
											<input class="form-control" data-name="fontSize" type="number" id="fontSize">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Color</label>
											<input class="form-control fill" data-name="color" type="color" name="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Style</label>
											<select class="form-control" data-name="fontStyle" id="fontStyle">
												<option value="normal">Normal</option>
												<option value="italic">Italic</option>
												<option value="bold">Bold</option>
											</select>
										</div>
									</div>
									<div class="col-md-10 text-right">
										<div class="form-group">
											<label>Alignment</label>

											<div class="btn-group">
												<button type="button" class="btn btn-default" aria-label="Left Align">
												  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
												</button>
												<button type="button" class="btn btn-default" aria-label="Center Align">
												  <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span>
												</button>
												<button type="button" class="btn btn-default" aria-label="Right Align">
												  <span class="glyphicon glyphicon-align-right" aria-hidden="true"></span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>

						<div id="circle-tool" style="display: none">
							<div class="row">
								<div class="col-md-12 p-0">
									<h4 class="section-heading">Selected Tool: Circle</h4>
								</div>
							</div>

							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Circle Radius</label>
											<input class="form-control" data-name="radius" type="number" id="radius">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Fill Color</label>
											<input class="form-control fill" data-name="color" type="color" name="">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Width</label>
											<input class="form-control strokeWidth" data-name="strokeWidth" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Color</label>
											<input class="form-control stroke" data-name="stroke" type="color" name="">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div id="triangle-tool" style="display: none">
							<div class="row">
								<div class="col-md-12 p-0">
									<h4 class="section-heading">Selected Tool: Triangle</h4>

								</div>
							</div>

							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Width</label>
											<input class="form-control width" data-name="width" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Height</label>
											<input class="form-control height" data-name="height" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Width</label>
											<input class="form-control strokeWidth" data-name="strokeWidth" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Color</label>
											<input class="form-control stroke" data-name="stroke" type="color" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Fill Color</label>
											<input class="form-control fill" data-name="color" type="color" name="">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div id="rectangle-tool" style="display: none">
							<div class="row">
								<div class="col-md-12 p-0">
									<h4 class="section-heading">Selected Tool: Rectangle</h4>
								</div>
							</div>

							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Width</label>
											<input class="form-control width" data-name="width" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Height</label>
											<input class="form-control height" data-name="height" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Width</label>
											<input class="form-control strokeWidth" data-name="strokeWidth" type="number" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Stroke Color</label>
											<input class="form-control stroke" data-name="stroke" type="color" name="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Fill Color</label>
											<input class="form-control fill" data-name="color" type="color" name="">
										</div>
									</div>
								</div>
							</form>
						</div>

						<div id="image-tool" style="display: none">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <h4 class="section-heading">Selected Tool: Image</h4>
                                </div>
                            </div>

                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Width</label>
                                            <input class="form-control scaleX" data-name="width" type="number" name="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <input class="form-control scaleY" data-name="height" type="number" name="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Stroke Width</label>
                                            <input class="form-control strokeWidth" data-name="strokeWidth" type="number" name="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Stroke Color</label>
                                            <input class="form-control stroke" data-name="stroke" type="color" name="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
					</section>

					
				</div>
			</div>
			<!-- Right sidebar ends -->

			@endsection




			@section('right-side')

			<!-- Left sidebar starts -->

			<div class="col-md-2 ">
                  <!-- weather widget start -->
	            <div class="weather hidden">
	              
	                <a target="_blank" href="http://www.booked.net/weather/abeokuta-w364843"><img src="https://w.bookcdn.com/weather/picture/1_w364843_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=55777"  id = "Abeokuta" alt="booked.net"/></a>

	            </div>

	            <div class="weather hidden">
	                <a target="_blank" href="http://www.booked.net/weather/abuja-9871"><img src="https://w.bookcdn.com/weather/picture/1_9871_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=w209&anc_id=61514"  alt="booked.net" id="Abuja" /></a>
	            </div>

	            <div class="weather hidden">
	                <a target="_blank" href="http://www.booked.net/weather/lagos-14299"><img src="https://w.bookcdn.com/weather/picture/1_14299_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Lagos" /></a>
	            </div>

	            <div class="weather hidden">
	                <a target="_blank" href="http://www.booked.net/weather/ibadan-w656040"><img src="https://w.bookcdn.com/weather/picture/1_w656040_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Ibadan" /></a>
	        	</div>
	            <!-- weather widget ends-->  
	        </div>
		
		@endsection


		@section('extra-script')
			
			<!-- Custom Index -->
		<script src="js/custom1.js"></script>

		@endsection