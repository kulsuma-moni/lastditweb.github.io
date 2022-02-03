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
        <meta property="og:image:width" content="100%" />
        <meta property="og:image:height" content="100%" />
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
        <style>
        .translated-ltr{margin-top:-40px;}
        .translated-ltr{margin-top:-40px;}
        .goog-te-banner-frame {display: none;margin-top:-20px;}

        .goog-logo-link {
           display:none !important;
        } 

        .goog-te-gadget{
           color: transparent !important;
        }
    </style>

</head>
<body>
    <!--Strat Preloader Area-->
  {{--   <div class="loader_bg">
        <div class="loader"></div>
    </div>     --}}
    <!--End Preloader Area-->

    <a href="#" class="back2 aaa" style="display: block; margin-bottom:-80px;"> <i class="fas fa-chevron-up" aria-hidden="true"></i> </a>
    
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


                        <li class="nav-item  custom-nav-item home-nav">
                            <a class="nav-link custom-nav-link hvr-underline-from-left" href="{{ route('careers') }}">Career</a>
                        </li>
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
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
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
                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Explore</h3>
                        <ul class="footer-links-list">
                            <li><a href="{{ route('/') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('freelancers') }}">Freelancer</a></li>
                            <li><a href="{{ route('entrepreneurs') }}">Enterpreneur</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>

                            @guest
                            <li><a href="{{ route('login') }}">Account</a></li>
                            
                            @else
                            @if(Auth::user()->is_editor == 1 || Auth::user()->is_admin == 1)
                            <li><a href="{{ route('dashboard') }}">Dasboard</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            
                            @endguest
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Resource</h3>
                        <ul class="footer-links-list">
                            <li><div id="google_translate_element"></div></li>
                            <li><a href="{{ route('team') }}">Team</a></li>
                            <li><a href="{{ route('admission.form') }}">Admission</a></li>
                            <li><a href="{{ route('portfolios') }}">Portfolio</a></li>
                            <li><a href="{{ route('courses') }}">Courses</a></li>
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                            <li><a href="{{ url('software') }}">Resources</a></li>
                            <li><a href="{{ url('newcourses') }}">Newcourses</a></li>
                            <li><a href="{{ url('streview') }}">Student Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
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

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102715874633514");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!--End Footer Area-->


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

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
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.easypiechart.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/translate.js')}}"></script>
    <script>
        $(function($) {
            $.autofilter();
        });
    </script>
        <script>
        // TYPED JS
        var typed = new Typed('.type_txt', {
            strings: ['Digitalized Up Your Business With <Span>Delwar IT</Span>', 'Develop your skill with <Span>Delwar IT</Span>'],
            typeSpeed: 100,
            backSpeed: 100,
            backDelay: 900,
            loop:true,
            loopCount: Infinity,
            showCursor: false,
            smartBackspace: true // Default value
        });
    </script>
    <script>
    $(document).ready(function(){

    $("#testimonial-slider").owlCarousel({
        items:2,
        loop:true,
        pagination:true,
        navigation:false,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,

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
    <script>
      $(document).ready(function(){
        $("#top_author_slider").owlCarousel({
        items:4,
        loop:true,
        margin:20,
        responsiveClass:true,
        dots:false,
        nav:true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:2,
            },
            800:{
                items:3,
            },
            1040:{
                items:4,
            }
        }
        });
    });
    </script>
        <script>
        	// Skill
	$('.chart').easyPieChart({
		barColor: '#0368ec',
		trackColor: 'lightGray',
		scaleColor: '#1AA7F1',
		scaleLength: 5,
		lineCap: 'round',
		lineWidth: 8,
		trackWidth: undefined,
		size: 110,
		rotate: 0, // in degrees
		animate: {
			duration: 1000,
			enabled: true
		},
		easing: function (x, t, b, c, d) { // easing function
			t = t / (d/2);
			if (t < 1) {
			return c / 2 * t * t + b;
			}
			return -c/2 * ((--t)*(t-2) - 1) + b;
		}
		});

    </script>
        <script>
        function redmore1() {
        var dots = document.getElementById("dots1");
        var moreText = document.getElementById("re_text1");
        var btnText = document.getElementById("red_mo1");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
        function redmore2() {
        var dots = document.getElementById("dots2");
        var moreText = document.getElementById("re_text2");
        var btnText = document.getElementById("red_mo2");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
        function redmore3() {
        var dots = document.getElementById("dot3");
        var moreText = document.getElementById("re_text3");
        var btnText = document.getElementById("red_mo3");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
        function redmore4() {
        var dots = document.getElementById("dots4");
        var moreText = document.getElementById("re_text4");
        var btnText = document.getElementById("red_mo4");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
        function redmore5() {
        var dots = document.getElementById("dots5");
        var moreText = document.getElementById("re_text5");
        var btnText = document.getElementById("red_mo5");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
        function redmore6() {
        var dots = document.getElementById("dots6");
        var moreText = document.getElementById("re_text6");
        var btnText = document.getElementById("red_mo6");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
        }
    </script>
    
</body>