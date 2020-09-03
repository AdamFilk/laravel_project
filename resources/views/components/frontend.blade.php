<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eye Of The Eagle</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('frontend/img/mdb-favicon.ico')}}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- icofont -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/icon/icofont/icofont.min.css')}}">

  
</head>
<body>
	<!-- banner slider -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner img-gradient">
    <div class="carousel-item active">
      <img class="d-block w-100 " src="{{asset('frontend/image/banner6.jpg')}}" alt="..." style="height:100vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Enjoy the beauty of Myanmar (Oo Pain Bridge)</h5>
        <p>See the beauty of Myanmar with the Eye of the Eagle!</p>

      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 " src="{{asset('frontend/image/banner8.jpg')}}" alt="Second slide" style="height: 100vh">
      <div class="carousel-caption d-none d-md-block">
        <h5>Enjoy the beauty of Myanmar (Nga Pa Li)</h5>
        <p>See the beauty of Myanmar with the Eye of the Eagle!</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100" src="{{asset('frontend/image/banner4.jpg')}}" alt="Third slide" style="height: 100vh">
      <div class="carousel-caption d-none d-md-block">
        <h5>Enjoy the beauty of Myanmar (Bagan)</h5>
        <p>See the beauty of Myanmar with the Eye of the Eagle!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	<!-- nav -->

	<header>

            <div class="container-fluid " >

                <nav class="navbar navbar-expand-lg navbar-dark w-100 fixed-top" style="  background-color: #525f7f;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="{{('frontend/image/logo2.png')}}" alt="" height="60px"></a>
                    <img src="{{asset('frontend/image/sidelogo4.1.png')}}" alt="" style="height: 40px">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <i class="icofont-block-down"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                        	 <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 20px"><i class="icofont-meetme"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" style="color: black" href="blog.html">Login/Sign Up</a></li>
                                    <li class="nav-item"><a class="nav-link"style="color:black" href="blog-single.html">Log Out</a></li>
                                </ul>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="{{'/'}}">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('location')}}">Locations</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('booking')}}">Booking</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('customize')}}">Your Customized Package</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Original Packages</a></li>

                            
                            
                        </ul>
                    </div> 
                </nav>
            </div>
  </header>
  {{ $slot }}
  <!-- footer -->
    <!-- footer -->
    <div id="foot" style="background-color:#525f7f" class="py-5">
    <div class="container" style="background-color: #525f7f; color: white">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <h3>Eye of The Eagle</h3>
          <hr style="background-color: white;">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit adipisci architecto nobis, expedita numquam! Tempore error, sint odio saepe quis, a cumque aspernatur eum, accusantium, labore tempora placeat natus nostrum?</p>
        </div>
        <div class="col-3">
          <span class="display-5">Useful Links</span><hr style="background-color: white;">
          <ul>
            <li>Home</li>
            <li>About Us</li>
            <li>Services</li>
            <li>Terms of Services
            <li>Privacy</li>

          </ul>
        </div>
        <div class="col-3">
          <span class="display-5">Social Links</span><hr style="background-color: white;">
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>
          </ul>
        </div>
        <div class="col-3">
          <span class="display-5">Contat Us</span><hr style="background-color: white;">
          <label for="name">Name:</label>
          <input type="text" name="name"  class="form-control mb-3" placeholder="Enter Name">
          <label for="name">Phone:</label>
          <input type="text" name="number"  class="form-control mb-3" placeholder="Enter Ph No">
          <label for="feedback">Feedback:</label>
          <textarea class="form-control mb-3" name="feedback" placeholder="Enter Feedback"></textarea>
          <button type="submit" class="btn btn-contactus">Contact</button>
        </div>
      </div>
    </div>
    </div>
  </div>
   <!-- jQuery -->
  <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('frontend/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('frontend/js/mdb.min.js')}}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
</body>
</html>