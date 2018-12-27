<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css')}}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic')}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ URL::to('css/landing-page.min.css')}}">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logo2.png">&nbsp;TELVIDA DIGITAL SIGNAGE SOLUTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <a class="btn btn-success" href="{{ route('mediapartner.register') }}">Partner Registration</a>
       <!--  <a class="btn btn-primary" href="{{--{{ url('/users/login') }}--}}">Content Owner Sign In</a>
           <a class="btn btn-primary" href="{{--{{ url('/users/register') }}--}}">Register Content Owner</a> -->
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <header class="jumbotron my-4">
        <h5 class="display-3">Become a partner!</h5>
             <a href="#" class="btn btn-primary btn-lg">Learn more</a>
      </header>

    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <!--<h3>Fully Responsive</h3>-->
              <p class="lead mb-0">Customize how each screen is laid out with individual zones that can have their own schedules and playlists.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
              <!--<h3>Bootstrap 4 Ready</h3>-->
              <p class="lead mb-0">Upload unlimited photos, videos & docs</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <!--<h3>Easy to Use</h3>-->
              <p class="lead mb-0">Create schedules & playlists</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <header class="jumbotron my-4">
        <h5 class="display-3">Become a Content Owner!</h5>
        <a href="#" class="btn btn-primary btn-lg">Learn more</a>
      </header>
    
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <!--<h2>Fully Responsive Design</h2>-->
            <p class="lead mb-0"><h5>Schedule, manage and upload content to your screens at the click of a button, all from your browser</h5></p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <!--<h2>Updated For Bootstrap 4</h2>-->
            <p class="lead mb-0"><h5>Easily display your latest offers, share company news, show off your brand's social media, and much more.

ScreenCloud CMS</h5>
</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <!--<h2>Easy to Use &amp; Customize</h2>-->
            <p class="lead mb-0"><h5>Customize fonts, colors & layouts</h5></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Telvida 2017. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{URL::to('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
