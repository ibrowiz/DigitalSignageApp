<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from jesus.gallery/everest/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:42:29 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Everest Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}">
		<title>Everest Admin Panel</title>
		
		<!-- Bootstrap CSS -->
		  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}" >

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{URL::to('css/font-awesome.min.css') }}">

    <!-- Animate CSS -->
    <link href="{{ URL::to('css/animate.css')}}" rel="stylesheet" media="screen">

    <!-- Alertify CSS -->
    <link href="{{ URL::to('css/alertify/alertify.core.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/alertify/alertify.default.css')}}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ URL::to('css/main.css')}}" rel="stylesheet" media="screen">
    <link href="{{ URL::to('css/custom.css')}}" rel="stylesheet" media="screen">

	<!-- <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	 -->

    <!-- Datepicker CSS -->
    {{-- <link rel="stylesheet" href="{{URL::to('css/bootstrap-datetimepicker.min.css') }}"> --}}
    <link rel="stylesheet" href="{{URL::to('css/sweetalert.css')}}">
    <link rel="icon" href="{{URL::to('images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::to('css/dataTables.bootstrap.min.css')}}">
    
    <script src="{{URL::to('js/jquery-3.1.1.js') }}"></script>
    

    <!-- jQuery UI JS -->
    <script src="{{ URL::to('js/jquery-ui-v1.10.3.js') }}"></script>

    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>
{{--     <script src="{{URL::to('js/moment.min.js')}}"></script>
    <script src="{{URL::to('js/bootstrap-datetimepicker.min.js')}}"></script> --}}
    <script src="{{URL::to('js/sweetalert.min.js') }}"></script>

	 @yield('extra-css')
		
	</head>  

	<body>

		<!-- Header Start -->
		@include('layouts.admin.header')
		<!-- Header ends -->

		<!-- Left sidebar starts -->
		@include('layouts.admin.sidebar')
		<!-- Left sidebar ends -->

		<!-- Dashboard Wrapper starts -->
		<div class="dashboard-wrapper">

			<!-- Top Bar starts -->
			@include('layouts.admin.topbar')
			<!-- Top Bar ends -->

			<!-- Main Container starts -->
			<div class="main-container">

				<!-- Container fluid Starts -->
				<div class="container-fluid">
			
			@yield('content')

			</div>
			<!-- Container fluid Starts -->
			</div>
			<!-- Main Container ends -->

			<!-- Right sidebar starts -->
			@include('layouts.admin.rightsidebar')
			<!-- Right sidebar ends -->

			<!-- Footer starts -->
			@include('layouts.admin.footer')
			<!-- Footer ends -->
			<!-- Footer ends -->

		</div>
		<!-- Dashboard Wrapper ends -->

		{{--<script src="{{ URL::asset('js/jquery-3.1.1.js"') }}"></script>--}}

		{{--<script src="{{ URL::asset('js/jquery-3.1.0.js"') }}"></script>--}}

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		{{--<script src="{{ URL::asset('js/jquery.js"') }}"></script>--}}
		 <script src="{{ URL::to('js/sparkline.js') }}"></script>

    <!-- jquery ScrollUp JS -->
    <script src="{{ URL::to('js/scrollup/jquery.scrollUp.js') }}"></script>

    <!-- Notifications JS -->
    <script src="{{ URL::to('js/alertify/alertify.js') }}"></script>
    <script src="{{ URL::to('js/alertify/alertify-custom.js') }}"></script>

    <!-- Custom Index -->
    <script src="{{ URL::to('js/custom.js') }}"></script>



    <script src="{{URL::to('js/bootstrap-notify.min.js') }}"></script>

    {{-- <script src="{{URL::to('js/socket.io.js')}}"></script> --}}

    <script src="{{URL::to('js/Chart.bundle.min.js')}}"></script>
    
    <script src="{{URL::to('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{URL::to('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{URL::to('js/custom-dataTable.js') }}"></script>

     @yield('extra-script')

	</body>

<!-- Mirrored from jesus.gallery/everest/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:43:48 GMT -->
</html>