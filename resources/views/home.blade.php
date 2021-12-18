@php
$setting = App\Models\Admin\Setting::first();
@endphp
@extends('layouts.app')
@section('title','Delwarit | Home')

@section('content')

      <!--Start Banner Area-->
      <section class="banner-wrapper-area">
         <div class="banner">
            <img src="{{ asset('public/frontend/assets/images/banner.svg') }}" alt="" class="img-fluid">
         </div>
         <div class="round-3">
            <img src="{{ asset('public/frontend/assets/images/shape4.png') }}" alt="" class="img-fluid">
         </div>
         <div class="banner-wrap">
            <div class="container">
               <div class="ellipse1">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse1.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="ellipse2">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse2.svg') }}" alt="" class="img-fluid">
               </div>
               <!--Desktop view-->
               <div class="desktop-area">
                  <div class="row align-items-center">
                     <div class="col-lg-5">
                        <div class="banner-content">
                           <h1>Digitalized Up Your Business With <span>Delwar IT</span></h1>
                           <div class="em-bar-main">
                              <div class="em-bar em-bar-big"></div>
                           </div>
                           <p>6 Years Of Exprience in IT industry.</p>
                           <div class="btn-default">
                              <div class="button-one">
                                 <a href="{{ route('admission.form') }}" class="default">Get Started</a>
                              </div>
                              <div class="button-two">
                                 <a href="{{ route('about') }}" class="default-one">About Us</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="image">
                           <img  src="{{ asset('public/frontend/assets/images/wedevs-hero-image.svg') }}" alt="" class="img-fluid bounce-2">
                        </div>
                     </div>
                  </div>
               </div>
               <!--Desktop view end-->
               <!--laptop view-->
               <div class="laptop-area">
                  <div class="row align-items-center">
                     <div class="col-lg-7">
                        <div class="image">
                           <img  src="{{ asset('public/frontend/assets/images/wedevs-hero-image.svg') }}" alt="" class="img-fluid bounce-2">
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="banner-content">
                           <h1>Digitalized Up Your Business With <span>Delwar IT</span></h1>
                           <div class="em-bar-main">
                              <div class="em-bar em-bar-big"></div>
                           </div>
                           <p>6 Years Of Exprience in IT industry.</p>
                           <div class="btn-default">
                              <div class="button-one">
                                 <a href="{{ route('admission.form') }}" class="default">Get Started</a>
                              </div>
                              <div class="button-two">
                                 <a href="{{ route('about') }}" class="default-one">About Us</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--laptop view end-->
            </div>
         </div>
      </section>
      <!--End Banner Area-->
      
      <section class="glassmo">
         <div class="banner-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="mail">
                        <div class="mail-icon">
                           <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="mail-description">
                           {{-- <h4>Contact Number</h4> --}}
                           <p>@if($setting) {{ $setting->phone }} @endif <br> @if($setting) {{ $setting->hotline }} @endif</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="mail">
                        <div class="mail-icon">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="mail-description">
                           {{-- <h4>Our Location</h4> --}}
                           <p>@if($setting) {{ $setting->address }} @endif </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="mail">
                        <div class="mail-icon">
                           <i class="fas fa-clock"></i>
                        </div>
                        <div class="mail-description">
                           {{-- <h4>Opening Hours</h4> --}}
                           <p>9am - 8pm<br> Saturday - Thursday</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="mail">
                        <div class="mail-icon">
                           <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="mail-description">
                           {{-- <h4>Our Email
                           </h4> --}}
                           <p>info.delwarit@gmail.com<br>admin@delwarit.com</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--Start Service Section-->
      <section class="course-wrapper-area">
         <span class="it-up-service-shape position-absolute deco1"><img src="{{ asset('public/frontend/assets/images/s-shape1.png') }}" alt=""></span>
         <span class="it-up-service-shape position-absolute deco2"><img src="{{ asset('public/frontend/assets/images/s-shape2.png') }}" alt=""></span>
         <div class="dots">
            <img src="{{ asset('public/frontend/assets/images/dots.png') }}" alt="" class="img-fluid">
         </div>
         <div class="course-wrap">
            <div class="container">
               <div class="row">
                  <div class="course-title">
                     <h2>Our Courses</h2>
                     <div class="em-bar-main">
                        <div class="em-bar em-bar-big"></div>
                     </div>
                     <p>Explore the weapons of Latest Information Technology!</p>
                  </div>
               </div>
               <div class="course-box">
                  <div class="row">
                    @foreach($courses as $course)
                     <div class="col-lg-4 col-md-6">
                        <div class="home-service-item fluid-height">
                           <div class="home-service-details full-height">
                              <div class="home-service-image">
                                 <img src="{{ asset('storage/app/public/'.$course->image) }}" alt="service" class="rounded-circle">
                              </div>
                              <div class="home-service-text">
                                 <h3>{{ $course->name }}</h3>
                                 <p>{!! Str::words( $course->description, '15','...') !!}</p>
                                 <div class="default-btn">
                                    <a href="{{ route('single.course',$course->slug) }}">Read More +</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Service Section-->
      <!--Start Solution Area-->
      <section class="solution-wrapper">
         <span class="it-up-service-shape position-absolute deco1"><img src="{{ asset('public/frontend/assets/images/s-shape1.png') }}" alt=""></span>
         <span class="it-up-service-shape position-absolute deco2"><img src="{{ asset('public/frontend/assets/images/s-shape2.png') }}" alt=""></span>
         <div class="solution-wrap">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <div class="solution-content">
                        <h5>_What We Do_</h5>
                        <h2>Perfect Solution For Your Business</h2>
                        <div class="em-bar-main">
                           <div class="em-bar em-bar-big"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="content">
                        <p>As our motto, we always provide the bst service<br> especially for your company by growing your<br>company to be better</p>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="{{ asset('public/frontend/assets/images/headphn.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="service-content">
                           <h4>24/7 Online Support</h4>
                           <p>24/7 Online Support- We always listen to our students. Any time they are in a problem, our team is always online for providing support to them. Even at night, we are online for your projects ongoing.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="{{ asset('public/frontend/assets/images/customer.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="service-content">
                           <h4>Lifetime Support</h4>
                           <p>All CITI students get supports for life. For any live project get our experts' guideline and maintain it in international standard.Even at night, we are online for your projects ongoing.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="service-box text-center">
                        <div class="service-icon">
                           <img src="{{ asset('public/frontend/assets/images/cm.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="service-content">
                           <h4>Practice Lab Support</h4>
                           <p>AWe offer lab practise facilities for weak students where they can practice the task and be able to hold the attention by solving what is not understood by them.we are online for your projects</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="solution-box">
                     <a href="{{ route('services') }}" class="default">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Solution Area-->
      <!--Start About Section-->
      <section class="about-wrapper-area">
         <div class="triangle">
            <img src="{{ asset('public/frontend/assets/images/triangle.png') }}" alt="" class="img-fluid">
         </div>
         <div class="about-wrap">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6">
                     <div class="about-image">
                        <img src="{{ asset('public/frontend/assets/images/about-image.png') }}" alt="" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="about-content">
                        <h2>About our Company</h2>
                        <div class="em-bar-main">
                           <div class="em-bar em-bar-big"></div>
                        </div>
                        <p><span>Delwar IT</span> is an institution where empowering the community for an excellent standard of learning is what we desire. DELWAR IT also provides training in various IT fields to Create Skilled & Professionally Committed IT Experts.</p>
                        <div class="about-box">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="about-feature">
                                    <div class="feature-box">
                                       <img src="{{ asset('public/frontend/assets/images/seetings.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="feature-content">
                                       <h4>It Trainning</h4>
                                       <p>Providing best quality of class</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="about-feature">
                                    <div class="feature-box">
                                       <img src="{{ asset('public/frontend/assets/images/idea.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="feature-content">
                                       <h4>Great Idea</h4>
                                       <p>IT solutions expertise allows your business.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="about-box">
                           <div class="about-btn">
                              <a href="{{ route('about') }}" class="default">About Us</a>
                           </div>
                           <div class="play-btn">
                              <a class="popup-youtube" href="https://www.youtube.com/watch?v=Y5KCDWi7h9o"><i class="fas fa-play"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End About Section-->
      <!--Start Categori area-->
      <section class="categories-wrapper-area">
         <div class="categories-wrap">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 mx-auto">
                     <h2 class="text-center">Popular categories</h2>
                     <div class="em-bar-main">
                        <div class="em-bar em-bar-big"></div>
                     </div>
                  </div>
               </div>
               <div class="row">
                @foreach($portfoliocates as $portfoliocate)
                  <div class="col-lg-3 col-sm-6 col-md-6">
                     <div class="card-deck">
                        <a href="#0">
                           <div class="card-body-one">
                                 <img style="width:100%;" src="{{ asset('storage/app/public/'.$portfoliocate->image) }}" alt="">
                              <p class="popular-categories-link">{{ $portfoliocate->name }}<br>Software</p>
                           </div>
                        </a>
                     </div>
                  </div>
                  @endforeach
               </div>

            </div>
         </div>
      </section>
      <!--End Categori area-->
      <!--Start Leader Section-->
      <section class="leader-wrapper-area">
         <div class="circle">
            <img src="{{ asset('public/frontend/assets/images/circle.png') }}" alt="" class="img-fluid">
         </div>
         <div class="leader-wrap">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="leader-title text-center">
                        <h2>Creating Future Leader</h2>
                        <div class="em-bar-main">
                           <div class="em-bar em-bar-big"></div>
                        </div>
                        <p>We are the makers of Future Leaders!</p>
                     </div>
                  </div>
               </div>
               <div class="leader-content-area">
                  <div class="row align-items-center">
                     <div class="col-lg-4 col-md-5 col-sm-6">
                        <div class="leader-image">
                           <img src="{{ asset('public/frontend/assets/images/leader.jpg') }}" alt="" class="img-fluid">
                        </div>
                     </div>
                     <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="leader-speech">
                           <p>As one of the leading IT solution providers of Bangladesh,<br> we are working with the vision of making the nation proficient in the <br>  Global ITvillage by building a platform which serves business owners <br>  as well as freelancers with comprehensive training for IT skills and<br> professional enterprise solutions.Where we develop a progressive, empower and consumer focused corporate culture to growing market leadership along with the passion of corporate social responsibility to extend our leadership through performance.
                           </p>
                           <h4>Syed Delwar Hussain <span>Founder, Chairman, and CEO at Delwar IT</span></h4>
                           <div class="leader-btn">
                              <a href="{{ route('ceo') }}" class="default">Read More</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Leader Section-->
      <!--Start Blog Area-->
      <section class="blog-wrapper-area">
         <div class="blog-wrap">
            <div class="container">
               <div class="row">
                  <div class="blog-title text-center">
                     <h2>Our Blog</h2>
                     <div class="em-bar-main">
                        <div class="em-bar em-bar-big"></div>
                     </div>
                     <p>We are the makers of Future Leaders!</p>
                  </div>
               </div>
               <div class="row justify-content-center">
                @foreach($blogs as $blog)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="blog-box">
                        <div class="blog-image">
                           <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="blog-text">
                           <div class="bc-header">
                              <div class="row">
                                 <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                    <p> <i class="far fa-clock"></i> <span>{{ $blog->created_at->format('d') }}</span> {{ $blog->created_at->format('M Y') }}</p>
                                 </div>
                                 <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                    <p class="bch-comments"><i class="far fa-comment"></i>3 comments</p>
                                 </div>
                              </div>
                           </div>
                           <div class="bc-text">
                              <h3><a href="{{ route('single.blog',$blog->slug) }}">{!! Str::words($blog->title,'6','..') !!}</a>
                              </h3>
                           </div>
                           <div class="bc-btn">
                              <a href="{{ route('single.blog',$blog->slug) }}">Read More +</a>
                           </div>
                        </div>
                     </div>
                  </div>
                @endforeach
               </div>
            </div>
         </div>
      </section>
      <!--End Blog Area-->
            <!-- Start Review Area -->
      <section class="review_area">
         <div class="container">
            <div class="row">
               <div class="review-title text-center">
                  <h2>Student Feedback</h2>
                  <div class="em-bar-main">
                     <div class="em-bar em-bar-big"></div>
                  </div>
                  <p>We are the makers of Future Leaders!</p>
               </div>
            </div>
            <div class="review_content_wrp">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div id="testimonial-slider" class="owl-carousel">
                         <div class="item">
                           <div class="testimonial">
                              <div class="testimonial-content">
                                  <p>1Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                                      molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                  </p>
                              </div>
                             <div class="testimonial-info">
                                 <div class="pic">
                                     <img src="{{ asset('public/frontend/assets/images/commentor_1.png') }}">
                                 </div>
                                 <h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
                             </div>
                          </div>
                         </div>
						 <div class="item">
							<div class="testimonial">
								<div class="testimonial-content">
									<p>2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
										molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									</p>
								</div>
								<div class="testimonial-info">
									<div class="pic">
										<img src="{{ asset('public/frontend/assets/images/commentor_2.png') }}">
									</div>
									<h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
								</div>
							</div>
						 </div>
						 <div class="item">
							<div class="testimonial">
								<div class="testimonial-content">
									<p>3Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
										molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									</p>
								</div>
								<div class="testimonial-info">
									<div class="pic">
										<img src="{{ asset('public/frontend/assets/images/commentor_3.png') }}">
									</div>
									<h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
								</div>
							</div>
						 </div>
						 <div class="item">
							<div class="testimonial">
								<div class="testimonial-content">
									<p>4Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
										molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									</p>
								</div>
							   <div class="testimonial-info">
								   <div class="pic">
									   <img src="{{ asset('public/frontend/assets/images/commentor_1.png') }}">
								   </div>
								   <h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
							   </div>
								</div>
						 </div>
						 <div class="item">
							<div class="testimonial">
								<div class="testimonial-content">
								   <p>5Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
									  molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
									  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								   </p>
								</div>
								<div class="testimonial-info">
								   <div class="pic">
									  <img src="{{ asset('public/frontend/assets/images/commentor_2.png') }}">
								   </div>
								   <h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
								</div>
						  </div>
						 </div>
						 <div class="item">
							<div class="testimonial">
								<div class="testimonial-content">
								   <p>6Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
									  molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
									  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
								   </p>
								</div>
								<div class="testimonial-info">
								   <div class="pic">
									  <img src="{{ asset('public/frontend/assets/images/commentor_3.png') }}">
								   </div>
								   <h3 class="testimonial-title">krystal <br><span>Web Developer</span></h3>
								</div>
						  </div>
						 </div>
                      </div>
                  </div>
              </div>
            </div>
         </div>
      </section>
      <!-- End Review Area -->
      <!--Start Counselling Section-->
      <!-- <section class="counselling-wrapper">
         <div class="shape-one">
            <img src="{{ asset('public/frontend/assets/images/shape1.png') }}" alt="" class="img-fluid">
         </div>
         <div class="counselling-wrap">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6">
                     <div class="counseling-form" id="counseling-form">
                        @if(session('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> {{session('success')}}.
                          </div>
                        @endif
                        <h3>Career Counselling</h3>
                        <div class="em-bar-main">
                           <div class="em-bar em-bar-big"></div>
                        </div>
                        <form action="{{ route('create.contact') }}" method="post">
                           @csrf
                           <input type="text" placeholder="Your Name" name="name" value="" class="form-control  "  required  oninvalid="this.setCustomValidity('Enter Your Name Here')"
                         oninput="this.setCustomValidity('')">

                           <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  ">
                           <input type="email" placeholder="Email Address" name="email" value="" class="form-control  " required  oninvalid="this.setCustomValidity('Enter Valid Email Here')"
                         oninput="this.setCustomValidity('')">
                           <input type="hidden" value="2" name="devide">
                           <div class="form-floating">
                              <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required  oninvalid="this.setCustomValidity('Write a message here')" oninput="this.setCustomValidity('')"></textarea>
                              <label for="floatingTextarea2">Comments</label>
                           </div>
                           <button type="submit" class="btn  default">Submit</button>
                        </form>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <img src="{{ asset('public/frontend/assets/images/animation_640_kmndncpb.gif') }}" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
         </div>
      </section> -->
      <!--End Counselling Section-->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection
