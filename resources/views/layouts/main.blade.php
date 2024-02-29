<!doctype html>
<html lang="en">


<head>
    <!-- required meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- #keywords -->
    <meta name="keywords" content="boot, Bootstrap, Oddsx Sports Betting Website HTML Template">
    <!-- #description -->
    <meta name="description" content="Oddsx Sports Betting Website HTML Template">
    <!-- #title -->
    <title>{{ env('APP_NAME') }} - Sports Betting predictions </title>
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{url('assets/images/fav.png')}}" type="image/x-icon">
    <!-- ==== css dependencies start ==== -->
    <link rel="stylesheet" href="{{url('assets/css/style.min.css')}}">
</head>

<body>
    <!-- start preloader -->
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- end preloader -->

    <!-- Header Starts -->
    <header class="header-section2 header-section">
        <nav class="navbar navbar-expand-lg position-relative py-md-3 py-lg-6 workready">
            <div class="collapse navbar-collapse justify-content-between" id="navbar-content">
                <ul
                    class="navbar-nav2fixed  navbar-nav d-flex align-items-lg-center gap-4 gap-sm-5  py-2 py-lg-0 align-self-center p2-bg">
                    <li class="dropdown show-dropdown">
                        <a href="/">Home</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('match/ft')}}">Football tips</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('match/ou')}}">Over under</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('match/st')}}">Single tips</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('match/do')}}">Daily 20+ odds</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('match/bs')}}">Bonus suprise</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('verify')}}">Correct score</a>
                    </li>
                    <li class="dropdown show-dropdown">
                        <a href="{{url('verify')}}">Half/Full time score</a>
                    </li>
                    
                    
                </ul>
            </div>
        
            <button class="navbar-toggler mt-1 mt-sm-2 mt-lg-0" type="button" data-bs-toggle="collapse"
                aria-label="Navbar Toggler" data-bs-target="#navbar-content" aria-expanded="true" id="nav-icon3">
                <span></span><span></span><span></span><span></span>
            </button>
        </nav>
        <div id="div10" class="navigation left-nav-area box3  position-fixed">
            <div
                class="logo-area slide-toggle3 trader-list position-fixed top-0 d-flex align-items-center justify-content-center pt-6 pt-md-8 gap-sm-4 gap-md-5 gap-lg-7 px-4 px-lg-8">
                <i class="ti ti-menu-deep left-nav-icon n8-color order-2 order-lg-0 d-none">
                </i>
                <a class="navbar-brand d-center text-center gap-1 gap-lg-2 ms-lg-4" href="index.html">
                    <img class="logo" src="{{url('logo.png')}}" alt="Logo" width="30" width="30">
                   
                </a>
            </div>
          
        </div>
    </header>
 
    <!-- Header Ends -->
    <!-- Hero Section Starts -->
    <section class="hero_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 gx-0 gx-sm-4">
                    <div class="hero_area__main">
                        <div class="row w-100">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section Ends -->
    <!-- Top Matches Section Starts -->
 @yield('content')
  


    <!-- ==== js dependencies start ==== -->
    <script src="{{url('assets/js/plugins/plugins.js')}}"></script>
    <script src="{{url('assets/js/plugins/plugin-custom.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>

</body>
</html>
