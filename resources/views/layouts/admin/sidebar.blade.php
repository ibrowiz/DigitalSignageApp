<aside id="sidebar">

			<!-- Current User Starts -->
			<div class="current-user">
				<div class="user-avatar animated rubberBand">
					<img src="{{ URL::asset('img/user4.jpg') }}" alt="Current User">
					<span class="busy"></span>
				</div>
				<div class="user-name">Welcome {{Auth::user()->firstname }}</div>
				<ul class="user-links">
					<li>
						<a href='{{url("/admin/profile/edit/{ Auth::user()->id}")}}'>
							<i class="fa fa-user text-success"></i>
						</a>
					</li>
					<li>
						<a href="{{url('/admin/logout') }}">
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
								<a href="{{url('admin/users/create') }}">
								
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href='{{url("admin/users/index") }}'>
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
								<a href='{{url("admin/resource")}}'>
									<i class="fa fa-asterisk"></i> 
									<span>Resources</span>
								</a>
							</li>
							<li>
								<a href='{{url("admin/layouttemplates")}}'>
									<i class="fa fa-asterisk"></i> 
									<span>Layout Templates</span>
								</a>
							</li>
						</ul>
					</li>
					
					<!-- <li>
						<a href="#">
							<i class="fa fa-folder-open-o"></i>
							<span>TRANSACTION LOGS</span>
						</a>
					</li> -->
					<li>
						<a href='{{route("admin.role.index") }}'>
							<i class="fa fa-users"></i>
							<span>ROLES</span>
						</a>
					</li>
					<li>
						<a href='{{route("admin.permission.index")}}'>
							<i class="fa fa-asterisk"></i>
							<span>PERMISSIONS</span>
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<i class="fa fa-users"></i>
							<span>MEDIA PARTNERS</span>
						</a>
					</li> -->
					<!-- <li>
						<a href='#'>
							<i class="fa fa-users"></i>
							<span>CONTENT OWNERS</span>
						</a>
					</li> -->
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-desktop"></i> 
							<span>DEVICE</span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/device/add') }}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('admin/device/index') }}">
									<span>All Devices</span>
								</a>
							</li>
							<!-- <li>
								<a href="#">
									<span>Assigned Devices</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span>Unassigned Devices</span>
								</a>
							</li>	
							<li>
								<a href="#">
									<span>Assigned Devices</span>
								</a>
							</li> -->
							
						</ul>
					</li>
					<li>
						<a href="{{url('admin/bank/index')}}">
							<i class="fa fa-bank"></i>
							<span>BANK ACCOUNT</span>
						</a>
					</li>
					
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-users"></i> 
							<span>PLANS</span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/plan/create') }}">
								
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href='{{url("admin/plan/index") }}'>
									<span>All Plans</span>
								</a>
							</li>
							
						</ul>
					</li>
					
					{{-- <li class='has-sub'>
						<a href="">
						 <i class="fa fa-cogs"></i> 
							<span>ALLOCATE CREDIT</span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/credit/index')}}">
									<span>Media Partner</span>
								</a>
							</li>
							<li>
								<a href="{{url('admin/credit/index')}}">
									<span>Content Owner</span>
								</a>
							</li>
						</ul>
					</li> --}}

					

					<!-- <li class='has-sub'>
						<a href='#'>
							<i class="fa fa-money fa-lg"></i>
							<span>PAYMENTS</span>
						</a>
						<ul>
							<li>
								<a href="#{{-- {{url('admin/payments-pending-approval')}} --}}">
									<span>Pending Approval</span>
								</a>
							</li>
							<li>
								<a href="#{{--{{url('admin/payments/approved')}}--}}">
									<span>Approved</span>
								</a>
							</li>
							<li>
								<a href="#{{--{{url('admin/payments/declined')}}--}}">
									<span>Declined</span>
								</a>
							</li>
						</ul>
					</li> -->

					<li class='has-sub'>
						<a href='#'>
							<!-- <i class="fa fa-desktop"></i>  -->
							<span>TEMPLATE </span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/template/create')}}">
									<span>Create New</span>
								</a>
							</li>
							<li>
							
								<a href="{{url('admin/template/index')}}">
									<span>All Templates</span>
								</a>
							</li>
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<!-- <i class="fa fa-desktop"></i>  -->
							<span>CONTENT CATEGORY</span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/contentcategory/create')}}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('admin/contentcategory/index')}}">
									<span>All Category</span>
								</a>
							</li>
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<!-- <i class="fa fa-desktop"></i>  -->
							<span>CONTENT</span>
						</a>
						<ul>
							<li>
								<a href="{{url('admin/allowedcontent/create')}}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href="{{url('admin/allowedcontent/index')}}">
									<span>All Content</span>
								</a>
							</li>
						</ul>
					</li>

					<li>
						<a href='{{url("/admin/profile/edit/{Auth::user()->id}")}}'>
							<i class="fa fa-cog fa-spin fa-lg"></i> 
							<span>PROFILE SETTINGS</span>
						</a>
					</li>
					
					<li>
						<a href="{{url('/admin/logout') }}">
							<i class="fa fa-sign-out"></i> 
							<span>LOGOUT</span>
						</a>
					</li>
						
				</ul>
			</div>
			<!-- Menu End -->

		</aside>