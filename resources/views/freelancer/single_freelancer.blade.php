@extends('layouts.app')

@section('title','Delwarit | '{{-- .$freelancer->name --}})

@section('content')

    
    <section class="single-banner-wrapper">
        <div class="job-wrap">
            <div class="container">
            <div class="ellipse1">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse1.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="ellipse2">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse2.svg') }}" alt="" class="img-fluid">
               </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="hero-content-area text-left">
                            <h4>Frelancers In {{ $freelancer->district->name }}</h4>
                            <h1>{{ $freelancer->name }}</h1>
                            <div class="p-text">
                                <p>{{ $freelancer->profession }}</p>
                            </div>
                            <a href="#" class="btn default hire_btn">Hire me</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="hero-thumb">
                            <div class="hero-thumb-inner">
                                <img src="{{ asset('public/frontend/assets/images/top_freelancer_pro.png')}}" alt="slider-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top_freelencer_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="top_flencer_left_nav">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link default active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">About</button>
                                <button class="nav-link default" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Service</button>
                                <button class="nav-link default" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Portfolio</button>
                                <button class="nav-link default" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Contact</button>
                            </div>
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="ad_box">
                                        <div class="row">
                                            <div class="top_frlancer_title text-center">
                                                <span>resume</span>
                                                <h2>About Me</h2>
                                                <div class="em-bar-main">
                                                    <div class="em-bar em-bar-big"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 col-12">
                                                <div class="ab_image">
                                                    <img src="{{ asset('public/frontend/assets/images/hero.png') }}" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12 col-12">
                                                <div class="ab_details">
                                                    <div class="more_details">
                                                        <h3>personal infos</h3>
                                                        <ul>
                                                            <li>first name:<strong> Steve</strong></li>
                                                            <li>last name:<strong> Milner</strong></li>
                                                            <li>Age:<strong> 27</strong></li>
                                                            <li>Nationality:<strong> Tunisian</strong> </li>
                                                            <li>Freelance:<strong> Available</strong> </li>
                                                            <li>Address:<strong> Tunis</strong></li>
                                                            <li>phone:<strong> +21621184010</strong></li>
                                                            <li>Email:<strong style="text-transform: lowercase;"> you@mail.com</strong></li>
                                                            <li>Skype:<strong> steve.milner</strong></li>
                                                            <li>langages:<strong> French, English</strong></li>
                                                            <li></li>
                                                        </ul>
                                                        <button class="default">Download CV</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="experience_education">
                                                    <div class="education_titel text-center">
                                                        <h3>Experience & Education</h3>
                                                    </div>
                                                    <div class="ex_quali_item">
                                                        <span class="brifcase"><i class="fas fa-briefcase"></i></span>
                                                        <div class="main_container">
                                                            <div class="time">
                                                                <span>2020 - present</span>
                                                            </div>
                                                            <div class="titel">
                                                                <h4>Web Developer - Envato</h4>
                                                            </div>
                                                            <div class="brif">
                                                                <p>Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore adipisicing elit.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ex_quali_item">
                                                        <span class="brifcase"><i class="fas fa-briefcase"></i></span>
                                                        <div class="main_container">
                                                            <div class="time">
                                                                <span>2020 - present</span>
                                                            </div>
                                                            <div class="titel">
                                                                <h4>Web Developer - Envato</h4>
                                                            </div>
                                                            <div class="brif">
                                                                <p>Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore adipisicing elit</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ex_quali_item">
                                                        <span class="brifcase"><i class="fas fa-briefcase"></i></span>
                                                        <div class="main_container">
                                                            <div class="time">
                                                                <span>2020 - present</span>
                                                            </div>
                                                            <div class="titel">
                                                                <h4>Web Developer -Envato</h4>
                                                            </div>
                                                            <div class="brif">
                                                                <p>Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore adipisicing elit</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="skill_details">
                                                    <div class="skill_titel text-center">
                                                        <h3>My skills</h3>
                                                    </div>
                                                    <div class="quali_item">
                                                        <span class=" bullet"></span>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="85">
                                                                        <span class="percent">85%</span>
                                                                        <span class="txt">html</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="90">
                                                                        <span class="percent">90%</span>
                                                                        <span class="txt">css3</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quali_item">
                                                        <span class=" bullet"></span>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="85">
                                                                        <span class="percent">85%</span>
                                                                        <span class="txt">sass</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="80">
                                                                        <span class="percent">80%</span>
                                                                        <span class="txt">javascript</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quali_item">
                                                        <span class=" bullet"></span>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="60">
                                                                        <span class="percent">60%</span>
                                                                        <span class="txt">php</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                                <div class="main_counter">
                                                                    <span class="chart" data-percent="50">
                                                                        <span class="percent">50%</span>
                                                                        <span class="txt">laravel</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                        <div class="service_details">
                                            <div class="top_frlancer_title text-center">
                                                <span>Job</span>
                                                <h2>Service</h2>
                                                <div class="em-bar-main">
                                                    <div class="em-bar em-bar-big"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_service_box">
                                                        <div class="service_icon">
                                                            <span><i class="fas fa-bars"></i></span>
                                                        </div>
                                                        <div class="service_titel">
                                                            <h4>Business Stratagy</h4>
                                                        </div>
                                                        <div class="description">
                                                            <p>I throw myself down among the tall grass by the stream as I lie close to the earth.</p>
                                                        </div>
                                                        <div class="read_more_btn">
                                                            <span><i class="fas fa-arrow-right"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_service_box">
                                                        <div class="service_icon">
                                                            <span><i class="fas fa-chalkboard"></i></span>
                                                        </div>
                                                        <div class="service_titel">
                                                            <h4>App Development</h4>
                                                        </div>
                                                        <div class="description">
                                                            <p> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence.</p>
                                                        </div>
                                                        <div class="read_more_btn">
                                                            <span><i class="fas fa-arrow-right"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_service_box">
                                                        <div class="service_icon">
                                                            <span><i class="fas fa-bezier-curve"></i></span>
                                                        </div>
                                                        <div class="service_titel">
                                                            <h4>Responsive design</h4>
                                                        </div>
                                                        <div class="description">
                                                            <p>I throw myself down among the tall grass by the stream as I lie close to the earth.</p>
                                                        </div>
                                                        <div class="read_more_btn">
                                                            <span><i class="fas fa-arrow-right"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_service_box">
                                                        <div class="service_icon">
                                                            <span><i class="fas fa-bars"></i></span>
                                                        </div>
                                                        <div class="service_titel">
                                                            <h4>Business Stratagy</h4>
                                                        </div>
                                                        <div class="description">
                                                            <p>I throw myself down among the tall grass by the stream as I lie close to the earth.</p>
                                                        </div>
                                                        <div class="read_more_btn">
                                                            <span><i class="fas fa-arrow-right"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <div class="row">
                                        <div class="portfolio_details">
                                            <div class="top_frlancer_title text-center">
                                                <span>Works</span>
                                                <h2>Portfolio</h2>
                                                <div class="em-bar-main">
                                                    <div class="em-bar em-bar-big"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_portfolio_box">
                                                        <div class="portfolio_img">
                                                            <img src="{{ asset('public/frontend/assets/images/portfolio-10.jpg') }}" alt="portfolio image" class="img-fluid">
                                                            <div class="hover_btn">
                                                                <a href="#" class="btn">Live demo</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_portfolio_box">
                                                        <div class="portfolio_img">
                                                            <img src="{{ asset('public/frontend/assets/images/portfolio-10.jpg') }}" alt="portfolio image" class="img-fluid">
                                                            <div class="hover_btn">
                                                                <a href="#" class="btn">Live demo</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_portfolio_box">
                                                        <div class="portfolio_img">
                                                            <img src="{{ asset('public/frontend/assets/images/portfolio-10.jpg') }}" alt="portfolio image" class="img-fluid">
                                                            <div class="hover_btn">
                                                                <a href="#" class="btn">Live demo</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="tp_fr_portfolio_box">
                                                        <div class="portfolio_img">
                                                            <img src="{{ asset('public/frontend/assets/images/portfolio-10.jpg') }}" alt="portfolio image" class="img-fluid">
                                                            <div class="hover_btn">
                                                                <a href="#" class="btn">Live demo</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <div class="tp_fr_contact_box">
                                        <div class="row">
                                            <div class="top_frlancer_title text-center">
                                                <span>contact</span>
                                                <h2>Get in touch</h2>
                                                <div class="em-bar-main">
                                                    <div class="em-bar em-bar-big"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                                                <div class="tp_fr_contact_left_box">
                                                    <div class="left_titel">
                                                        <h4>Don't be shy !</h4>
                                                    </div>
                                                    <div class="titel_brif">
                                                        <p>Feel free to get in touch with me. I am always open to discussing new projects, creative ideas or opportunities to be part of your visions.</p>
                                                    </div>
                                                    <div class="address_info">
                                                        <ul>
                                                            <li>
                                                                <span><i class="far fa-map"></i></span>
                                                                <div class="detail">
                                                                    <h6>Address Point</h6>
                                                                    <p><a href="#">123 Stree New York City , United States Of America 750065.</a></p>
                                                                </div> 
                                                            </li>
                                                            <li>
                                                                <span><i class="far fa-envelope"></i></span>
                                                                <div class="detail">
                                                                    <h6>mail me</h6>
                                                                    <p><a href="#">steve@mail.com</a></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <span><i class="fas fa-phone"></i></span>
                                                                <div class="detail">
                                                                    <h6>call me</h6>
                                                                    <p><a href="#">+216 21 184 010</a></p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="social_media">
                                                        <h6>follow us</h6>
                                                        <ul>
                                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                                <div class="tp_fr_contact_right_box">
                                                <div class="contact_form">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="person_name form">
                                                                <input type="text" class="form-control" placeholder="name*" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="person_email form">
                                                                <input type="email" class="form-control" placeholder="email*" name="email" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="subject form">
                                                                <input type="text" class="form-control" placeholder="subject*" name="subject" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="message form">
                                                                <textarea name="message" class="form-control" spellcheck="false" placeholder="message*" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form_btn text-center" data-aos="fade-up">
                                                        <a href="#" type="submit" class="btn default" value="send message"><i class="far fa-paper-plane"></i> send message</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection