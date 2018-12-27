@extends('personal')


@section('top-nav')

    
        
        
        <!-- Logo starts -->
        <div class="logo">
            <a href="#">
                <img src="{{URL::to('images/logo.png')}}" width="50" alt="logo"> <span style="color: #f2f2f2; font-size: 20px;"> TVD Signage </span>
                <span class="menu-toggle hidden-xs">
                    <i class="fa fa-bars"></i>
                </span>
            </a>
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
                <li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
                    <a href="#">
                        <i class="fa fa-reorder"></i>
                    </a>
                </li>     

                <li class="list-box user-profile hidden-xs">
                    <a href="#" class="user-avtar animated rubberBand">
                        <img src="{{ URL::to('img/user4.jpg') }}" alt="user avatar">
                    </a>
                </li>
            </ul>
        </div>
        <!-- Mini right nav ends -->


    
  
@endsection

@section('sidebar')


    <!-- Current User Starts -->
    <div class="current-user">
        <div class="user-avatar animated rubberBand">
            <img src="{{ URL::to('img/user4.jpg') }}" alt="Current User">
            <span class="busy"></span>
        </div>
        <div class="user-name">Welcome {{ auth::user()->name }}</div>
        <ul class="user-links">
            <li>
                <a href="#">
                    <i class="fa fa-user text-success"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-desktop text-warning"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-sliders text-info"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out text-danger"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
    <!-- Current User Ends -->

    <!-- Menu start -->

    
    <div id='menu'>

        <ul>

            <li class="highlight">
                <a href="">
                    <i class="fa fa-desktop fa-1x"></i> 
                    <span> Dashboard </span>
                </a>
            </li>

            <li >
                <a href="{{URL::to('/resource')}}">
                    <i class="fa fa-desktop fa-1x"></i> 
                    <span> Resources </span>
                </a>
            </li>

            <li >
                <a href="{{URL::to('/welcome')}}">
                    <i class="fa fa-desktop fa-1x"></i> 
                    <span> Layouts </span>
                </a>
            </li>
             <li >
                <a href="{{URL::to('/content')}}">
                    <i class="fa fa-desktop fa-1x"></i> 
                    <span> Content Types </span>
                </a>
            </li>

            <li>
                <a href="{{URL::to('/templates')}}"> 
                    <i class="fa fa-bar-chart fa-1x"></i>
                    <span> Templates  </span>
                </a>
                
            </li>

            <li>
               <!--  <a href="{{URL::to('/playindex')}}">
                    <i class="fa fa-desktop"></i>
                    <span> Playlist</span>
                    
                </a> -->
            </li>

        </ul>

    </div>

        


@endsection