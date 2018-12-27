<aside id="sidebar">

			<!-- Current User Starts -->
			<div class="current-user">
				<div class="user-avatar animated rubberBand">
					<img src="{{ URL::asset('img/user4.jpg') }}" alt="Current User">
					<span class="busy"></span>
				</div>
				<div class="user-name">{{ Auth::user()->name }}</div>
				<ul class="user-links">
					<li>
						<a href="profile">
							<i class="fa fa-user text-success"></i>
						</a>
					</li>
					<li>
						<a href="invoice">
							<i class="fa fa-file-pdf-o text-warning"></i>
						</a>
					</li>
					<li>
						<a href="components">
							<i class="fa fa-sliders text-info"></i>
						</a>
					</li>
					<li>
						<a href="login">
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
						<a href='index'>
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
							<span class="current-page"></span>
						</a>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-flask"></i> 
							<span>CREATE</span>
						</a>
						<ul>
							<li>
								<a href='invoice'>
									<span>Create New</span>
								</a>
							</li>
							<li>
								<a href='profile'>
									<span>System Media</span>
								</a>
							</li>
							<li>
								<a href="pricing">
									<span>Gallery</span>
								</a>
							</li>
						</ul>
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-"></i> 
							<span>REGISTER DEVICE</span>
						</a>
						
					</li>

					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-desktop"></i> 
							<span>DEVICE</span>
						</a>
						<ul>
							<li>
								<a href="{{url('/device/add') }}">
									<span>Add New</span>
								</a>
							</li>
							<li>
								<a href='#'>
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
					</li>
					<li>
						<a href='#'>
							<i class="fa fa-user"></i> 
							<span>ACCOUNT</span>
						</a>
					</li>
					<li>
						<a href='#'>
							<i class="fa fa-cog fa-spin fa-lg"></i> 
							<span>SETTINGS</span>
						</a>
					</li>
					<li>
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
					</li>
					<li>
						<a href="{{url('/admin/logout') }}">
							<i class="fa fa-sign-out"></i> 
							<span>LOGOUT</span>
						</a>
					</li>
					<li>
						<a href="{{url('/admin/logout') }}">
							<i class="fa fa-sign-out"></i> 
							<span>LOGOUT</span>
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