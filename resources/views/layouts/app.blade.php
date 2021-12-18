@php
$setting = App\Models\Admin\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
      <!-- Links of CSS file -->


      @if($setting)
        <meta property="og:type" content="Training Institute,Training Institute sylhet" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta property="og:site_name" content="DelwarIT" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon)}}">
        <meta name="og:image" content="{{ asset('/storage/app/public/'.$setting->logo) }}"/>
        <meta name="og:title" content="{{ $setting->title }}" />
        <meta name="og:description" content="{{ $setting->meta_description }}" />
      @endif
      @yield('header')
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/fontawesome.min.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/magnific-popup.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/odometer.min.css')}}">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css')}}">
      <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/responsive.css')}}">
      <link rel="canonical" href="http://delwarit.com/" />
      <link rel="canonical" href="http://smartcity.com.bd/" />
      <link rel="canonical" href="http://storialtech.com/" />

</head>
<body>
    <!--Strat Preloader Area-->
  {{--   <div class="loader_bg">
        <div class="loader"></div>
    </div>     --}}
    <!--End Preloader Area-->

    <a href="#" class="back2 aaa" style="display: block;"> <i class="fas fa-chevron-up" aria-hidden="true"></i> </a>
    
    <!--Start Laptop Menu-->
    <header class="nav-wrapper fixed-top res-static">
        <nav class="navbar navbar-expand-lg navbar-light  custom-nav">
            <div class="container">
                <div class="logo-wrap">
                    <div class="logo">
                        <a href="{{ route('/') }}">
                            @if($setting->logo)<img src="{{ asset('storage/app/public/'.$setting->logo) }}" class="img-fluid" alt="">@endif
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">   
                        <i class="fas fa-bars" style="color:#fff; font-size:25px;"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav custom-navbar ms-auto">
                        <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('/') }}">Home</a>
                        </li>
                        <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('courses') }}">Courses</a>
                        </li>
                        <li class="nav-item dropdown  active custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left home-nav-caret" href="#0">Admission</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admission.form') }}">Admission Form</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('addmission.procedure') }}">Admission Procedure</a>
                            </div>
                        </li>
                        <li class="nav-item   custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('services') }}">Services</a>
                        </li>
                        <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('blogs') }}">Blog</a>
                        </li>
                        <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="#">Career</a>
                        </li>
                        <!-- <li class="nav-item dropdown custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link  hvr-underline-from-left home-nav-caret" href="#0">About</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('about') }}">About Us</a>
                            </div>
                        </li> -->
                        <!-- <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('portfolios') }}">Portfolio</a>
                        </li> -->
                        <!-- <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('login') }}">Account</a>
                        </li> -->
                    </ul>
                    <a class=" custom-nav-link menu-btn" href="{{ route('start.project') }}">Start A Project</a>
                </div>
            </div>
        </nav>
    </header>
    <!--End Laptop Menu-->

     @yield('content')

    <!--Start Footer Area-->
    <footer class="footer-area">
        <div class="round">
            <img src="{{ asset('public/frontend/assets/images/round.png') }}" alt="" class="img-fluid">
        </div>
        <div class="round2">
            <img src="{{ asset('public/frontend/assets/images/round2.png') }}" alt="" class="img-fluid">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <a class="logo" href="/"><img src="{{ asset('public/frontend/assets/images/logo2.png') }}" alt="logo"></a>
                        <p>@if($setting) {{ $setting->meta_description }} @endif</p>
                        <ul class="social-link">
                            <li class="facebook"><a href="@if($setting) {{ $setting->fb_link }} @endif" class="d-block" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="twitter"><a href="@if($setting) {{ $setting->twitter_link }} @endif" class="d-block" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li class="instragram"><a href="@if($setting) {{ $setting->instagram_link }} @endif" class="d-block" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li class="linkedin"><a href="@if($setting) {{ $setting->web_link }} @endif" class="d-block" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Explore</h3>
                        <ul class="footer-links-list">
                            <li><a href="{{ route('/') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="#">Freelancer</a></li>
                            <li><a href="#">Enterpreneur</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li></ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Resource</h3>
                        <ul class="footer-links-list">
                            <li><a href="index.html">Team</a></li>
                            <li><a href="{{ route('admission.form') }}">Admission</a></li>
                            <li><a href="{{ route('portfolios') }}">Portfolio</a></li>
                            <li><a href="{{ route('courses') }}">Courses</a></li>
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Address</h3>
                        <ul class="footer-contact-info">
                            <li><i class="fas fa-map-marked-alt"></i> <a href="#0">@if($setting) {{ $setting->address }} @endif</a></li>
                            <li><i class="fas fa-phone"></i> <a href="#0">@if($setting) {{ $setting->phone }} @endif</a></li>
                            <li><i class="far fa-envelope-open"></i> <a href="#0">@if($setting) {{ $setting->email }} @endif</a></li>
                            <li><i class="fas fa-inbox"></i> <a href="#0">@if($setting) {{ $setting->hotline }} @endif (Whatsapp)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <p><i class="far fa-copyright"></i>2021 is Proudly Powered by 
                            <a target="_blank" href="https://envytheme.com/">Delwar It</a></p>
                        </div><div class="col-lg-6 col-md-6">
                            <ul>
                                <li><a href="/privacy-policy/">Privacy Policy</a></li>
                                <li><a href="/terms-of-service/">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <div class="footer-effect-one"></div>
        <div class="footer-effect-two"></div>
        <div class="footer-effect-three"></div>
    </footer>
    <!--End Footer Area-->

    <!-- Links of JS file -->
    <script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/odometer.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/custom.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('public/frontend/assets/js/autofilter.js')}}"></script>
    <script>
  $(function($) {
    $.autofilter();
});
</script>
    <script>
    $(document).ready(function(){

    $("#testimonial-slider").owlCarousel({
        items:2,
    margin:40,
    loop:true,
        pagination:true,
        navigation:false,
        autoplay:true,
    autoplayTimeout:6000,
    autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
            },
            800:{
                items:2,
            },
            1040:{
                items:2,
            }
        }
    });

    });

    </script>

    
</body>