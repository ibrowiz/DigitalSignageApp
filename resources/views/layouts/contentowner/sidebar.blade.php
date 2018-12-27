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
						<a href="#{{-- {{url('client/{$tenant->domain}/logout') }} --}}">

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
						<a href='#'>
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
								<a href="{{ route('client.user.createuser',[Auth::user()->client->tenant->domain])}}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{ route('client.user.users',[Auth::user()->client->tenant->domain]) }}">
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
								<a href='{{url("/client/{$tenant->domain}/resource")}}'>
									<i class="fa fa-asterisk"></i> 
									<span>Resources</span>
								</a>
							</li>
							<li>
								<a href='{{url("/client/{$tenant->domain}/layout/welcome")}}'>
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
								<a href='{{url("client/{$tenant->domain}/schedule/create")}}'>
									<span>Create Schedule </span>
								</a>
							</li>
							
							<!-- <li>
								<a href='#{{--{{url("client/{$tenant->domain}/schedules/devices")}}--}}'>
									<span>{{ucwords($tenant->domain)}} Devices' Schedules</span>
								</a>
							</li> -->

							<!-- <li>
								<a href='#{{--{{url("client/{$tenant->domain}/schedules/created")}}--}}'>
									<span>Created Schedules</span>
								</a>
							</li> -->
						</ul>
					</li>
					<!-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-tasks"></i> 
							<span>RESOURCE</span>
						</a>
						<ul>
							<li>
								<a href='invoice'>
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
					
					<li>
						<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/wallet/index') 
						}}">
						
							<i class="fa fa-money fa-lg"></i> 
							<span>WALLET</span>
						</a>
					</li>

					{{-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-bank"></i> 
							<span>PAYMENTS</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/contentowner/payment/index')}}">
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
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-desktop"></i> 
							<span>DEVICE</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/registerdevice')}}">
									<span>Register Device</span>
								</a>
							</li>
							<li>
							
								<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/devices')}}">
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
								<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/devicegroup/create') }}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/devicegroups') }}">
									<span>All Device Groups</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/packages') 
						}}">
						
							<i class="fa fa-asterisk"></i> 
							<span>UPGRAGE</span>
						</a>
					</li>
					<li>
						<a href="{{url('/client/'.Auth::user()->client->tenant->domain.'/profile/edit/'.Auth::user()->id)}}">
							<i class="fa fa-cog fa-spin fa-lg"></i> 
							<span>PROFILE SETTINGS</span>
						</a>
					</li>
					
					<li>
						{{-- <a href="{{url('/client/{$tenant->domain}/logout') }}">
						
							<i class="fa fa-sign-out"></i> 
							<span>LOGOUT</span>
						</a> --}}
						<form class="logout-form" method="post" action="{{url('client/'.Auth::user()->client->tenant->domain.'/logout') }}">
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