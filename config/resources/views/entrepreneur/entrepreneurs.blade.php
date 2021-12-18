@extends('layouts.app')


@section('title','DelwarIT || Entrepreneurs')

@section('content')

 <!--End Laptop Menu-->
      <section class="job-banner-wrapper">
         <div class="job-wrap">
            <div class="container">
               <div class="ellipse1">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse1.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="ellipse2">
                  <img src="{{ asset('public/frontend/assets/images/Ellipse2.svg') }}" alt="" class="img-fluid">
               </div>
               <div class="row align-items-center">
                  <div class="col-lg-8 mx-auto">
                     <div class="title text-center">
                        <h1>Top Entrepreneurs in Sylhet</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      

      <section class="freelancer-wrapper-area">
         <div class="freelancer-wrap">
            <div class="container">
               <div class="row">
                  @foreach($entrepreneurs as $entrepreneur)
                  <div class="col-lg-4 col-sm-6 col-md-6">
                     <div class="content">
                        <div class="image">
                           <img src="{{ asset('storage/app/public/'.$entrepreneur->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="title">
                           <h4>{{ Str::words($entrepreneur->name,1,'') }}</h4>
                        </div>
                        <div class="center-area">
                           <p>{{ Str::words($entrepreneur->profession,10,'') }}</p>
                        </div>
                        <div class="group-btn">
                           <a href="{{ route('single.entrepreneur',$entrepreneur->slug) }}">Read More</a>
                        </div>
                        <div class="shape">
                           <img src="{{ asset('public/frontend/assets/images/shape.png') }}" alt="services">
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="row">
                  <div class="load-btn">
                     <a href="0#" class="default">Load More</a>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection