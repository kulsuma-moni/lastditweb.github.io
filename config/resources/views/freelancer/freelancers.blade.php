@extends('layouts.app')


@section('title','DelwarIT || Freelancers')

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
                        <h1>Top Freelancers in Sylhet</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="freelance-wrapper-area">
         <div class="download">
            <img src="assets/{{ asset('public/frontend/images/download.png') }}" alt="" class="img-fluid">
         </div>
         <div class="freelance-wrap">
            <div class="container">
               <div class="row">
               	@foreach($freelancers as $freelancer)
                  <div class="col-lg-3 col-sm-6 col-md-6">
                     <div class="inner-item">
                        <div class="image">
                           <img src="{{ asset('storage/app/public/'.$freelancer->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="content">
                           <div class="title">
                              <h4>{{ $freelancer->name }}</h4>
                           </div>
                           <p>{{ $freelancer->profession }}</p>
                           <div class="group-btn">
                              <a href="{{ route('single.freelancer',$freelancer->slug) }}">Read More</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="row">
                  <div class="load-btn">
                     <a href="#0" class="default">Load More</a>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection