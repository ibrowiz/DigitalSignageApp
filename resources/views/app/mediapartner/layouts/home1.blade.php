@extends('layouts.master')


@section('extra-css')

<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

@endsection




@section('content')

   <div class="col-md-12 object" style=" padding-top: 10px; padding-bottom: 10px; margin-bottom: 5px;">
                            
                            <div class="col-md-9 col-md-offset-2" style="background-color: #F8F8F8; align-content: center;">

                                <form class="form-horizontal" id="form" method="POST" action="#">
                                    {{csrf_field()}}
                                <fieldset>

                                    <div class="col-md-2 form-group" style="margin-right: 2em;">
                                        <label class="control-label"> Layout Name </label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>

                                    <div class="col-md-2 form-group" style="margin-right: 2em;">
                                    <label class="control-label">Content Type</label>

                                   
                                    <select class="form-control" id="content_type" name="content_type">
                                         @foreach($contents as $content)
                                        <option value="{{$content->name}}" >{{$content->name}}</option>
                                         @endforeach()
                                       
                                    </select>

                                   
                                    </div>

                                    <div class="col-md-2 form-group" style="margin-right: 2em;">
                                        <label class="control-label"> Background Color </label>
                                        <input type="color" class="form-control color-prop" id="color">
                                    </div>
                                    <div class="col-md-2 form-group" style="margin-right: 2em;">
                                    <label class="control-label">Aspect Ratio</label>
                                    <select class="form-control" id="aspect_ratio" name="aspect_ratio">
                                        <option value="0" >Standard</option>
                                        <option value="1" >WideScreen</option>
                                    </select>
                                    </div>

                                    <div class="col-md-2 form-group" style="margin-right: 2em;">
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


                            
                                
                                
                            </div><!-- end col-md-9 -->

                            <div class="col-md-3 col-md-offset-2" >
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
                                            <option value="courier">Courfa ier</option>
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
                                    </div>
                                </div>
                                
                                
                            </div><!-- class-text -->
                            
                        </div><!-- col-md-7 -->



                        <div class="row">
                        <div class="col-md-2 ">
                            <div class="text">

                                    <span type="button" class="btn btn-default text fa fa-text-width" id="text"><br>Text</span>
                                    
                                </div>
                                <br>
                                <div class="">

                                        <div class="shape">
                                            
                                            <span type="button" class="btn btn-default fa fa-square click-shape" data-shape='shapes'><br> Shapes </span>

                                            <div class="shape-properties hidden ">
                                                
                                                <div>
                                                    <button type="button" class="btn btn-default object action" action='rectangle' > <span class="glyphicon glyphicon-square"> </span> Rectangle </button>
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


                                <br>

                                <div>
                                    <!-- <button type="button" class="btn btn-xs" id="text">Image</button> -->
                                    <div class="image">

                                        <span type="button" class="btn btn-default fa fa-image img" id="img" data-toggle="modal" data-target="#modal"><br>Images</span>

                                    </div>
                        
                                </div>

                                <br>
                                <div class=" text">
                                    <label class="myFile">

                                        <span type="button" class="btn btn-default fa fa-image"><br>Image</span>

                                        <input type="file" id="file" />

                                    </label>
                        
                                </div>
                                <br>
                                <div class="">
                                    <div class="shape">
                                                
                                                <span type="button" class="btn btn-default click-shape fa fa-cloud-upload" data-shape='widget' ><br> Weather </span>

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
                                <br>
                                <div class="text">
                                    <label class="">

                                        <span type="button" class="btn btn-default fa fa-youtube-play"  data-toggle="modal" data-target="#myModal"> <br>Youtube</span>

                                        <div>
                                            <!-- Trigger the modal with a button -->

                                                <!-- Modal -->
                                                <div id="myModal" class="modal fade" role="dialog">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                       <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                                        <h4 class="modal-title">Add a YouTube video</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <label>Video Url:</label>
                                                        <input type="text" name="url" id="url">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-default ok" data-dismiss="modal">Ok</button>
                                                      </div>
                                                    </div>

                                                  </div>
                                                </div>
                                        </div>
                                    </label>
                        
                                </div>
                                <br>
                                <div class=" text">
                                    <label class="web">

                                        <span type="button" class="btn btn-default fa fa-desktop"> <br>website</span>


                                    </label>
                        
                                </div>
                                <br>
                                <div class="date">

                                    <div class="shape">
                                                
                                                <span type="button" class="btn btn-default fa fa-history time"> <br>Date / Time</span>
                                                <div class="shape-properties hidden">

                                                    <div>
                                                        <button type="button" class="btn btn-default data" action='date' > <span class="glyphicon glyphicon-square"> </span> Date </button>
                                                    </div><br>
                                                    <div>
                                                        <button type="button" class="btn btn-default data" action='time' > <span class="glyphicon glyphicon-square"> </span> Time </button>
                                                    </div><br>
                                                    <div>
                                                        <button type="button" class="btn btn-default data" action='date&time' > <span class="glyphicon glyphicon-square"> </span> Date / Time </button>
                                                    </div>

                                                </div>
                                    </div>
                        
                                </div>
                            
                            <!-- weather widget start -->
                            <div class="weather hidden">
                                <a target="_blank" href="http://www.booked.net/weather/abeokuta-w364843"><img src="https://w.bookcdn.com/weather/picture/1_w364843_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=53369"  alt="booked.net" id="Abeokuta" /></a>
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

                         <div class="col-lg-6 col-md-10">
                                       <br>
                            <div class = "col-md-12 bar"> 
                                <div class="properties hidden">
                                    <button type="button" class="btn btn-xs fa fa-trash" id="delete" title="delete"></button>

                                    <button type="button" class="btn btn-xs fa fa-window-maximize click-shape" data-shape='edit' title="Fill Color" > </button>

                                            <div class="shape-properties hidden ">
                                                
                                                <div class="input-group input-xs">
                                                    <label class="input-group-addon input-xs">Color</label><input type="color" class="form-control input-xs color-prop">
                                                </div>

                                                <div class="input-group">
                                                    <button type="button" class="btn btn-primary action" action='cancel'>X</button>
                                                    <button type="button" class="btn btn-primary action" action='ok'>Ok</button>
                                                </div>
                                            </div>

                                    <button type="button" class="btn btn-xs outline fa fa-pencil" title="Otline Color" data-shape='outline' > </button>

                                            <div class="outline-properties hidden ">
                                                
                                                <div class="input-group input-xs">
                                                    <label class="input-group-addon input-xs ">Color</label><input type="color" class="form-control input-xs outline">
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
                            <div>
                            <button class="btn btn-primary" id="save-canvas" type="button" >Save</button>
                            <button class="btn btn-warning" id="preview" type="button" >Preview</button>
                            </div>
                            


                        </div><!--end col-md 10 -->

                        <div class="col-md-3">


                            <!-- <div class="right-sidebar"> -->
                <!-- <div class="container-fluid" id="toolSettings"> -->
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
                                            <select class="form-control" data-name = "fontFamily" id = "font">
                                                <option value="arial">Arial</option>
                                                <option value="helvetica">Helvetica</option>
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
                                            <label>Weight</label>
                                            <select class="form-control" data-name="fontWeight">
                                                <option value="normal">Normal</option>
                                                <option value="bold">Bold</option>
                                                <option value="400">400</option>
                                                <option value="600">600</option>
                                                <option value="800">800</option>
                                            </select>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Color</label>
                                            <input class="form-control fill" data-name="color" type="color">
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <div class="form-group">
                                            <label>Alignment</label>
                                                <br>
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
                                </div>
                            </form>
                        </div>

                    </section>

                    <section>
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <h4 class="section-heading"><span class="glyphicon glyphicon-cog"></span> General Settings</h4>
                            </div>
                        </div>

                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Background</label>
                                        <input class="form-control" type="color" name="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aspect Ratio</label>
                                        <select class="form-control">
                                            <option value="">Landscape</option>
                                            <option value="">Potrait</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                <!-- </div> -->
            <!-- </div> -->



                            <div class="setup" >
                                <p>welcome home</p>
                                    <button type="button" class="btn btn-lg fa fa-trash" id="trash" title="delete"></button>

                                    <button type="button" class="btn btn-lg fa fa-window-maximize click-shape" data-shape='edit' title="Fill Color" > </button>

                                            <div class="obj-properties hidden ">
                                                
                                                <div class="input-group input-xs">
                                                    <label class="input-group-addon input-xs">Color</label><input type="color" class="form-control input-xs color-prop">
                                                </div>

                                                <div class="input-group">
                                                    <button type="button" class="btn btn-primary action" action='cancel'>X</button>
                                                    <button type="button" class="btn btn-primary action" action='ok'>Ok</button>
                                                </div>
                                            </div>
                                            <br>

                                    <button type="button" class="btn btn-lg outline fa fa-pencil" title="Otline Color" data-shape='outline' > </button>

                                            <div class="line-properties hidden ">
                                                
                                                <div class="input-group input-xs">
                                                    <label class="input-group-addon input-xs ">Color</label><input type="color" class="form-control input-xs outline">
                                                </div>

                                                <div class="input-group">
                                                    <button type="button" class="btn btn-primary action" action='cancel'>X</button>
                                                    <button type="button" class="btn btn-primary action" action='ok'>Ok</button>
                                                </div>
                                            </div>
                                             <button type="button" class="btn btn-lg fa fa-files-o" id="copy" title="Copy"></button><br>
                                              <button type="button" class="btn btn-lg fa fa-clipboard" id="paste" title="Paste"></button>
                                               <button type="button" class="btn btn-lg fa fa-file-text-o" id="forward" title="BringForward"></button><br>
                                                <button type="button" class="btn btn-lg fa fa-files-o" id="back" title="SendBack"></button>

                                </div>
                            </div>
                                
                            </div>
                            
                            <!-- <button class="btn btn-primary" id="show-me"> predict</button> -->
                        </div>

                    </div>




                        <div id="modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                           <div class="modal-content">

                              <div class="modal-header">
                               
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Select Resources </h4>
                                <div class="" style="background-color:#C0C0f0 ">

                                </div>

                              </div>
                              <div class="modal-body">
                                
                                              <select id="resource">
                                                 @foreach($resources as $resource)
                                                <option value="{{$resource->file_name}}" id="{{$resource->path}}">{{$resource->label}}</option>

                                                @endforeach
                                            </select>
                                 
                                    <!-- <div class="modal-footer"> -->
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success add" data-dismiss="modal">Add</button>
                                <!-- </div> -->
                            
                                
                                </div>

                        </div>

                      </div>
                    </div>


                    <div id="trial">
                        <!-- <iframe width="420" height="315"
                            src="https://www.youtube.com/embed/XGSy3_Czz8k?autoplay=0" class="video">
                        </iframe> -->
                        <video width="800" height="480" controls="true" buffered="0" id="video1" class="video hidden">
                          <source src="public/Aya.mp4" type="video/mp4">
                        </video>

                        <iframe src="https://www.telvida.com" width="420" height="300" id="web"></iframe>

                       <!--  <video width="350" height="220" id="video1" style="display: none">
                            <source src="Aya.mp4">
                        
                        </video>
 -->


                            <!-- <object data="http://www.youtube.com/embed/W7qWa52k-nE"
                                width="560" height="315" id = "try"></object> -->


<!-- <div style="width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;" id = "another">
  <embed src="http://www.youtube.com/v/GlIzuTQGgzs?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=0" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="100%">
</div> -->

                    </div>



@endsection




@section('extra-script')



<script type="text/javascript">

    //draw canvas
    var can = new fabric.Canvas('draw');

    var cw = 642;
    var ch = 482;

//trial

    var video = $('<iframe /> ', {
        id: 'video',
        src: "http://www.youtube.com/embed/W7qWa52k-nE" ,
        type: 'video/mp4',
        controls: true
    });

     video.appendTo($('#trial'));



$('.modal-body').on('click', 'button.ok', function(e){
    var url = ($(this).parent().find('input:text').val());

    // var video = document.createElement("iframe");

    // video.src = "http://html5demos.com/assets/dizzy.mp4";  

    // var video1 = new fabric.Image(video, {
    //     left: 270,
    //     top: 250,
    //     angle: -15,
    //     originX: 'center',
    //     originY: 'center',
    //     centeredScaling: true
    // });
    // can.add(video1);
     //video1.getElement().play();
    // alert(url);


        var video11 = document.getElementById('video1');
        console.log(video11.src);
        var video = new fabric.Image(video11, {
            left: 270,
            top: 250,
            angle: 0,
            originX: 'center',
            originY: 'center',
        });
        can.add(video);
        video.getElement().play();
        fabric.util.requestAnimFrame(function render() {
            can.renderAll();
            fabric.util.requestAnimFrame(render);
        });
});


 $('.date').on('click', '.time', function(e){

     var shapeProp = $(this).parent('div').find('.shape-properties');
        shapeProp.toggleClass('hidden');
    $('.date').on('click', '.data', function(e){
         
         var action = $(this).attr('action');

             if (action ==='time'){
                var time = new Date().getTime();
                console.log(time);
                 var shapeProp = $(this).parent('div').parent('div.shape-properties');
                shapeProp.addClass('hidden');

             }else if(action ==='date'){
                var time = new Date();
                console.log(time.toString());
                 var shapeProp = $(this).parent('div').parent('div.shape-properties');
                 shapeProp.addClass('hidden');

             }else if(action ==='date&time'){

                 var shapeProp = $(this).parent('div').parent('div.shape-properties');
                    shapeProp.addClass('hidden');
             }


    });
            
 });

 $('.web').on('click', function(e){

     var image = document.getElementById('trial'); 

     alert (image);
        // var img = new fabric.Image.fromURL(image,{
        //     left: 270,
        //     top: 250,
        //     angle: 0,
        // });

        // can.add(img);

    

 });
    // shape properties display for  drawing

    // $('.modal-footer').on('click', 'button.add', function(e){
       $('.modal-body').change('#resource', function(){
             var resource = ($(this).find('option:selected').attr('value'));
             console.log(resource);
        });

        $('.modal-body').on('click', 'button.add', function(e){
             var resource = ($(this).parent('div').find('option:selected').attr('value'));
              var path = ($(this).parent('div').find('option:selected').attr('id'));

            var image = "storage/"+ path +"/"+resource;

            fabric.Image.fromURL(image, function(oImg) {
                
                    var ih = oImg.height;
                    var iw = oImg.width;
                    var cw = can.width;
                    var ch = can.height;
                    var fw;
                    var fh;
                    
                    var width_ratio  = cw  / iw;
                    var height_ratio = ch / ih;
                    if (width_ratio > height_ratio) {
                        fw = iw * width_ratio;
                        fh = ih*fw/iw;
                    } else {
                        fh = ih * height_ratio;
                        fw = iw*fh/ih;    
                    }
                    console.log(width_ratio);
                    console.log(height_ratio);
                    console.log(fw);
                    console.log(fh);
                
                    oImg.set({'left':150});
                    oImg.set({'top':50});
                    // oImg.set({'height':fh});
                    // oImg.set({'width':fw});

              can.add(oImg);

              console.log(oImg.width);
              console.log(oImg.height);
            });

         });


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


                    // var objectArea = document.getElementById('form');
                    //  var openDiv = document.createElement('div');
                    //  var holder = document.createElement('textArea');
                    //  var object = document.createElement('p');
                    //  object.setAttribute('id', 'triangle');
                        
                    //      holder.placeholder = 
                            

                    //      objectArea.appendChild(openDiv);
                    //      objectArea.appendChild(holder);
                    //      objectArea.appendChild(object);

                    // var type = $(this).data('object');
                    // var list = "<div class='list_element'> <p id = 'triangle'> </p><i class='fa fa-th-list'> </i> </div>";
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

                    // showSetting('circle-tool');

                    // var objectArea = document.getElementById('form');
                    //  var openDiv = document.createElement('div');
                    //  var holder = document.createElement('textArea');
                    //  var object = document.createElement('p');
                    //  object.setAttribute('id', 'circle');
                        
                    //      holder.value =object;
                            

                    //      objectArea.appendChild(openDiv);
                    //      objectArea.appendChild(holder);
                    //      objectArea.appendChild(object);

                    // var type = $(this).data('object');
                    // console.log(type);
                    // var list = "<div class='list_element'> <p id = 'circle'> </p><i class='fa fa-th-list'> </i> </div>";
                    // $('.object_container').append(list);

                break;
                default: console.log(action);
                        break;
            }

            //shape drawing ends here
            
    });


    //Text object;
    $('#text').on('click', function(e){

    //     can.on('mouse:down', function(options) {

    //      var a = 0;
    //     if ((options.target == null) &&(a ==0)){ 
    //     addText(options.e);

    //     a +=5;
    // }
    // console.log(a);
    //     });

    //     function addText(e) {
    //     var text = new fabric.IText('Add your text',{
    //     left: e.offsetX,
    //     top: e.offsetY
    //     });
    //     can.add(text);
    //     // text.enterEditing();
    //     // can.renderAll();

    //     }

        //     var text = new fabric.IText('',{
        //     left: e.offsetX,
        //     top: e.offsetY
        //     });
        //     can.add(text).setActiveObject(text);
        //     text.enterEditing();
        // }

        var text = new fabric.IText('Add your Text', 
                { left: 250, top: 350, id:'Itext' });
                    can.add(text);        
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
            //var $shape = $(this).parent('div').parent('div.shape-properties').parent('.shape').find('.click-shape');
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
            // e.target.bringToBack();
               var activeObject = can.getActiveObject();


            $('back').on('click', function(evt){
                if(acttiveObject != null)
                {
                can.sendToBack(activeObject);
                }
            });


             $('forward').on('click', function(evt){
                 evt.target.bringToFront();
            });


         
            var objectType = can.getActiveObject().get('type');
            var bar = $('.properties');
            bar.css({'position' : 'absolute', 'left': parseInt(activeObject.left) + 'px', 'top' : parseInt(activeObject.top) -30 +'px', 'z-index' : '1000'});
            bar.removeClass('hidden');
            var shapeProp = $('.properties').children('button');


            console.log(objectType);

            if((objectType==='text')||(objectType==='i-text')){
                
                var objectSize = activeObject.fontFamily;
                var text = $('.txt_properties');
                text.removeClass('hidden');
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

            else if (objectType === 'image'){
                 showSetting('image-tool');
                  // toolset properties
                var width = activeObject.width;
                console.log(width);
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
                
        });

        can.on('before:selection:cleared', function() {
                var bar = $('.properties');
                bar.addClass('hidden');
                var text = $('.txt_properties');
            text.addClass('hidden');
            $('.current-tool').children().hide();
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

                    // object fill

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
                
                }

            });
        });


        //preview
        $('#preview').on('click', function(evt){
            evt.preventDefault();

            var data = {id: 2};

            $.ajax({
                type: 'get',
                url: '{{ url('preview') }}',
                data: data,
                success: function(data) {
                    console.log(data);
                }
            })
            /*
            $('#draw').get(0).toBlob(function(blob){
                saveAs(blob,'mycanvas');
            })*/
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

        can.add(clonedObj);
        can.setActiveObject(clonedObj);
        can.requestRenderAll();
        });
        });

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

function showSetting(id){

    $('.current-tool').children().hide();
        $('#'+id).show();
}



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