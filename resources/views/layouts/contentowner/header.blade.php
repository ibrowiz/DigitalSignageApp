<header>

			<!-- Logo starts -->
			<div class="logo">
				<a class="navbar-brand" href="{{ url('/login') }}">
                        {{-- {{ 
			</div>
			<!-- Logo ends -->

			<!-- Custom Search Starts -->
			<div class="custom-search pull-left hidden-xs hidden-sm">
				<input type="text" class="search-query" placeholder="Search here">
				<i class="fa fa-search"></i>
			</div>
			<!-- Custom Search Ends -->

			<!-- Mini right nav starts -->
			<div class="pull-right">
				<ul id="mini-nav" class="clearfix">
					<li class="list-box user-profile hidden-xs">
						{{$tenant->domain}}
					</li>
				</ul>
			</div>
			<!-- Mini right nav ends -->

		</header>config('app.name', 'Laravel') }} --}}
                        <img src="{{URL::asset('images/logo2.png')}}">
                    </a>