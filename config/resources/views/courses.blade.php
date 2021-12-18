@php 
      $setting = App\Models\Admin\Setting::first();
@endphp

@extends('layouts.app')

@section('title','Delwarit | Courses')

@section('content')


      <!--Start About Inner Area-->
      <section class="about-wrapper-inner">
         <div class="about-wrap">
            <div class="container">
               <div class="ellipse1">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse1.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="ellipse2">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse2.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="inner-content">
                        <h1>Our Courses</h1>
                        <ul>
                           <li><a href="{{ route('/') }}">Home</a></li>
                           <li>/</li>
                           <li>Courses</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End About Inner Area-->
      <!--Start course area-->
      <section class="course-wrapper-area2">
         <div class="container">
            <div class="row">
               <div class="col-lg-4">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     @foreach($courses as $course)
                     <li class="nav-item item" role="presentation">
                        <a href="{{ route('single.course',$course->slug) }}" class="nav-link active" id="home-tab">{{ $course->name }}</a>
                     </li>
                     @endforeach
                  </ul>
                  <div class="title">
                     <h4>Counselling Area</h4>
                  </div>
                  <form method="post">
                     <input type="text" placeholder="Your Name" name="name" value="" class="form-control  ">
                     <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  ">
                     <input type="email" placeholder="Email Address" name="email" value="" class="form-control  ">
                     <button type="submit" class="btn  default">Submit</button>
                  </form>
               </div>
               <div class="col-lg-8">
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="gd-left">
                                 <h4>@if($lastcourse){{ $lastcourse->name }} @endif</h4>
                                 <div class="em-bar-main">
                                    <div class="em-bar em-bar-big"></div>
                                 </div>
                                 <p>@if($lastcourse){!! $lastcourse->description !!}@endif</p>
                              </div>
                              <div class="seat">
                                 <div class="btn">
                                    <button onclick="myFunction()" id="myBtn" class="default">Read more</button>
                                 </div>
                                 <div class="admission">
                                    <p>Admission Going On</p>
                                 </div>
                              </div>
                              <div class="career">
                                 <h4>Career Opportunity</h4>
                                 @if($lastcourse){!! $lastcourse->career !!}@endif
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Course area-->
      <!--Start Premium Area-->
      <section class="premium-wrapper-area">
         <div class="premium-wrap">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h2 class="text-center">Premium-course</h2>
                     <div class="em-bar-main">
                        <div class="em-bar em-bar-big"></div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/reactnative.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/reactnative.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/reactnative.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <h2 class="text-center top">Free-course</h2>
                     <div class="em-bar-main">
                        <div class="em-bar em-bar-big"></div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/es6.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/es6.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="premium-card">
                        <div class="card-image">
                           <img src="assets/images/es6.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-content">
                           <h4>React Live Project & Next.js</h4>
                           <hr>
                           <p>Source code All web site project tutorials. With Lumen Rest API and Next JS classes for free.</p>
                           <hr>
                           <h6 class="course-card-count"> Class:<span class="text-red"> 244  </span>    ,   Learning:<span class="text-red"> 354</span> </h6>
                           <hr>
                           <h6 class="course-card-count-fee">Course Fee: 2000 tk</h6>
                           <hr>
                           <div class="enroll">
                              <a target="_blank" href="https://www.youtube.com/watch?v=w7ejDZ8SWv8" class="default">Enroll Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Premium Area-->

@endsection



