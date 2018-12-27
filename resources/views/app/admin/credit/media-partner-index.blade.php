 @extends('layouts.admin.master')
@section('content')
@include('partials.flash_message')
  <!-- Spacer starts -->
          <div class="spacer">

          <!-- Row Start -->
           {{--  <div class="row">
             <div class="col-lg-12 col-md-12 col-sx-12 col-sm-12">
               <ul id="myTab" class="nav nav-tabs">
                 <li class="active">
                   <a href="#home" data-toggle="tab">Home</a>
                 </li>
                 <li>
                   <a href="#profile" data-toggle="tab">Profile</a>
                 </li>
                 <li class="dropdown">
                   <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                   <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                     <li>
                       <a href="#dropdown1" tabindex="-1" data-toggle="tab">@fat</a>
                     </li>
                     <li>
                       <a href="#dropdown2" tabindex="-1" data-toggle="tab">@mdo</a>
                     </li>
                   </ul>
                 </li>
               </ul>
               <div id="myTabContent" class="tab-content">
                 <div class="tab-pane fade in active" id="home">
                   <p class="no-margin">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                 </div>
               <div class="tab-pane fade" id="profile">
               
           
                     <div class="table-responsive">
                       <table class="table table-striped table-hover data-table" >
                         <thead>
                           <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Media Partner</th>
                             <th>Assign</th>
                           </tr>
                         </thead>
                               <tbody>
                                 
                                   @if(count($contentOwners) > 0)
                              @foreach($contentOwners as $contentOwner)
                                  <tr>
                                     <td>{{$contentOwner->name}}</td>
                                     <td>{{$contentOwner->email}}</td>
                                     <td>{{$contentOwner->tenant_domain}}</td>
                                     <td> <a href='#' class = "btn btn-success btn-xs" data-id="{{$contentOwner->id}}" data-toggle="modal" data-url="{{url('admin/credit/assign/'. $contentOwner->id)}}" data-target="#credit">Credit Wallet</a> 
                                   </td>
                                   </tr>
                                  
                                 @endforeach
                               @endif     
                                
                           </tbody>
                       </table>    
                     </div>
               
                
                      
                 </div>
                 <div class="tab-pane fade" id="dropdown1">
                   <p class="no-margin">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                 </div>
                 <div class="tab-pane fade" id="dropdown2">
                   <p class="no-margin">Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                 </div>
               </div>
             </div>
           </div>--}}
            <!-- Row End -->

            
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title">Allocate Credit</h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Name</th>
                               <th>Domain</th>
                              <th>Email</th>
                              <th>Transactions</th>
                              <th>Assign</th>
                            </tr>
                          </thead>
                                <tbody>
                                  
                                    @if(count($tenants) > 0)
                               @foreach($tenants as $tenant)
                                   <tr>
                                      <td>{{$tenant->name}}</td>
                                      <td>{{$tenant->domain}}</td>
                                      <td>{{$tenant->email}}</td>
                                      <td><a href='{{url("/admin/mediapartner/transactions/{$tenant->id}")}}' class = "btn btn-info btn-xs">Transactions</a></td>
                                      <td> <a href='#' class = "btn btn-success btn-xs" data-id="{{$tenant->id}}" data-toggle="modal" data-url="{{url('admin/mediapartner/credit/assign/'. $tenant->id)}}" data-target="#credit">Credit Wallet</a> 
                                    </td>
                                    </tr>
                                   
                                  @endforeach
                                @endif     
                                 
                            </tbody>
                        </table>    
                      </div>
                  </div>
              </div>
          </div>
      </div> 
  </div>
<!-- Spacer ends -->
<div class="modal fade" id="credit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Add Credit</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal" role="form" method="POST" action="">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="amount">Enter Amount</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name = "amount" 
                        id="amount" placeholder="Amount"/>
                    </div>
                  </div>
                
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div> 
@endsection



@section('extra-script')

<script type="text/javascript">

$('#credit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); 
  var url = button.data('url');
  var modal = $(this)
  modal.find('form').attr('action', url)
});

</script>




@endsection
        