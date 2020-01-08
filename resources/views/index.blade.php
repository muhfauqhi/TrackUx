<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700&display=swap" rel="stylesheet">

    
    <title>Home | Track Ux</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-menu" id="mainNav">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#">Track Ux</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto menu-li text-uppercase">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('posts')}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('products')}}">Products</a>
                </li>
                @if(Route::has('login'))
                    @auth
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/home">Dashboard</a>
                </li>
                    @else
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('login')}}">Login</a>
                </li>
                    @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{url('register')}}">Register</a>
                </li>
                    @endif
                    @endauth
                @endif
            </ul>
        </div>
        </div>
    </nav>
    
    <header>
        <div class="col-md-12 text-center header-title">
            <h1 class="home"><b>Track Ux</b> community for extreme sports</h1>
            <h4 class="home"><span class="typing"></span></h4>
            <div class="row-padding">
                <a class="btn btn-home btn-primary" href="{{ url('track-ux') }}">Get Started</a>
            </div>
        </div>
    </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="javascript/typed.min.js"></script>
    <script type="text/javascript">
        var typed = new Typed('.typing', {
            strings: ["Mountain Bike.^1000","BMX Racing.^500", "Skateboard.^500", "Freestyle Scooter.^500", "Surfing.^500", "Freediving.^1000"],
            loop: true,
            typeSpeed: 30,
            backSpeed: 30
        });
    </script>

  </body>
</html>