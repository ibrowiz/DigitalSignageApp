<aside id="sidebar">

			<!-- Current User Starts -->
			<div class="current-user">
				<div class="user-avatar animated rubberBand">
					<img src="{{ URL::asset('img/user4.jpg') }}" alt="Current User">
					<span class="busy"></span>
				</div>
				<div class="user-name">Welcome {{ Auth::user()->first_name }}</div>
				<ul class="user-links">
					<li>
						<a href="#">
							<i class="fa fa-user text-success"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-file-pdf-o text-warning"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-sliders text-info"></i>
						</a>
					</li>
					<li>
						<a href="{{url('/mediapartner/logout') }}">
							<i class="fa fa-sign-out text-danger"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- Current User Ends -->

			<!-- Menu start -->
			<div id='menu'>
				<ul>
					<li class="highlight">
						<a href="{{url('mediapartner/'.Auth::user()->tenant->domain.'/dashboard') }}">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="current-page"></span>
						</a>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-users"></i> 
							<span>USERS</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/operator/create')}}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/operators')}}">
									<span>All Users</span>
								</a>
							</li>
							
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-server"></i> 
							<span>CONTENT</span>
						</a>
						<ul>
							<li>
								<a href='{{url("/mediapartner/{$tenant->domain}/resource")}}'>
									<i class="fa fa-asterisk"></i> 
									<span>Resources</span>
								</a>
							</li>
							<li>
								<a href='{{url("/mediapartner/{$tenant->domain}/layout/welcome")}}'>
									<i class="fa fa-asterisk"></i> 
									<span>Layouts</span>
								</a>
							</li>
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-calendar"></i> 
							<span>SCHEDULES</span>
						</a>
						<ul>
							<li>
								<a href='{{url("mediapartner/{$tenant->domain}/schedule/create")}}'>
									<span>Create Schedule </span>
								</a>
							</li>
							
							<!-- <li>
								<a href='#{{--{{url("mediapartner/{$tenant->domain}/schedules/devices")}}--}}'>
									<span>{{ucwords($tenant->domain)}} Devices' Schedules</span>
								</a>
							</li> -->

							<!-- <li>
								<a href='#{{--{{url("mediapartner/{$tenant->domain}/schedules/created")}}--}}'>
									<span>Created Schedules</span>
								</a>
							</li> -->
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-desktop"></i> 
							<span>DEVICE</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/registerdevice')}}">
									<span>Register Device</span>
								</a>
							</li>
							<li>
							

								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/devices')}}">
									<span>All Devices</span>
								</a>
							</li>
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-server"></i> 
							<span>DEVICE GROUP</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/devicegroup/create')}}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/devicegroups')}}">
									<span>All Device Groups</span>
								</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/wallet/index') }}">
						
							<i class="fa fa-money fa-lg"></i> 
							<span>WALLET</span>
						</a>
					</li>

					{{-- <li>
						<a href="{{url('mediapartner/contentowner/credit/index') }}">
						
							<i class="fa fa-money fa-lg"></i> 
							<span>ALLOCATE CREDIT</span>
						</a>
					</li> --}}
					{{-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-bank"></i> 
							<span>PAYMENTS</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/mediapartner/payment/index') }}">
									<span>Make Payment </span>
								</a>
							</li>
							
							<li>
								<a href="{{url('/mediapartner/processpayment/index') }}">
									<span>Pending Approval</span>
								</a>
							</li>
						</ul>
					</li> --}}
					{{--<li>
						<a href="{{url('mediapartner/contentowner/credit/index') }}">
						
							<i class="fa fa-money fa-lg"></i> 
							<span>PROCESS PAYMENT</span>
						</a>
					</li>--}}
					<!-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-tasks"></i> 
							<span>RESOURCE</span>
						</a>
						<ul>
							<li>
								<a href='i'>
									<span>Create Resource</span>
								</a>
							</li>
							<li>
								<a href='profile'>
									<span>Create System Media</span>
								</a>
							</li>
							<li>
								<a href="pricing">
									<span>Create Gallery</span>
								</a>
							</li>
						</ul>
					</li> -->
					
					<!-- <li>
						<a href="#">
						<i class="fa fa-pencil"></i>
							<span>REGISTER DEVICE</span>
						</a>
					</li> -->


					{{-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-server"></i> 
							<span>DEVICE GROUP</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/devicegroup/add') }}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('/devicegroup/index') }}">
									<span>All Device Groups</span>
								</a>
							</li>
						</ul>
					</li> --}}
					

					
					
					
					<li>
						<a href="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/profile/edit/'.Auth::user()->id)}}">
							<i class="fa fa-cog fa-spin fa-lg"></i> 
							<span>PROFILE SETTINGS</span>
						</a>
					</li>
					<!-- <li>
						<a href='#'>
							<i class="fa fa-envelope"></i> 
							<span>IM</span>
						</a>
					</li>
					<li>
						<a href='#'>
							<i class="fa fa-mobile fa-3x"></i> 
							<span>MOBILE GATE WAY</span>
						</a>
					</li> -->
					
					<li>
						<form class="logout-form" method="post" action="{{url('/mediapartner/'.Auth::user()->tenant->domain.'/logout') }}">
							{{ csrf_field() }}
						</form>
						<a href="#" class="logout">
							<i class="fa fa-sign-out"></i> 
							<span>LOGOUT</span>
						</a>
						<script>
							$('.logout').on('click', function(e){
								$('.logout-form').submit();
							});
						</script>
					</li>
					
				</ul>
			</div>
			<!-- Menu End -->

		</aside>