<div class="spacer">
            
 <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

     <div class="blog blog-success">

        <div class="blog-header "> <h5 class="blog-title">Payments</h5> </div>

             <div class="blog-body">

         <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
          <div class="row" style="text-align: center">
            <h2>TRANSACTION STATUS (Query Response)</h2>

        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4>
                        <span class="glyphicon glyphicon-pushpin"></span>
                        {{$json['ResponseCode']}}</h4>
                    <p>{{$json['ResponseDescription']}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <P>RAW RESPONSE<br/>{{$json}}</P>
                </div>
            </div>
        </div>


    <div class="col-md-4">

      

        {{--@if($json['ResponseCode'] == "00")--}}
      

        <!-- nested row 3a: callouts -->

        <div class="thumbnail">
              <div class="caption">
                  <span class="glyphicon glyphicon-ok"></span>
                    <img src="css/thankyou.jpg" alt="ok"/>






            {{--@else--}}
                <!-- <img src="css/notok.jpg" alt="not ok"/> -->
            
                </div>

        </div>

    </div>
    </div>


        </div>   
      </div>
    </div>
  </div> 
</div>

