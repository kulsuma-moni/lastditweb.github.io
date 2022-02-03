@php
$setting = App\Models\Admin\Setting::first();
@endphp
@extends('layouts.app')
@section('title','Delwarit |'.$career->title)

@section('content')

      <!--Start job-oofer-->
      <section class="job-offer-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="job-title text-center">
                     <h2>{{ $career->title }}</h2>
                  </div>
                  <div class="job-post-meta-group text-center">
                     <span class="job-post-meta">
                     <i class="fas fa-box"></i>
                     <span>{{ $career->job_type }}</span>
                     </span>
                     <span class="job-post-meta">
                     <i class="fas fa-calendar-week"></i>
                     <span>{{ $career->created_at->format('d F,Y') }}</span>
                     </span>
                     <span class="job-post-meta">
                     <i class="fas fa-map-marker-alt"></i>
                     <span>{{ $career->address }}</span>
                     </span>
                  </div>
                  <div class="social-post-share text-center">
                     Share:&nbsp;
                     <div class="social-shared-item">
                        <a href="#0" target="_blank" class="facebook-share"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                     </div>
                     <div class="social-shared-item">
                        <a href="#0" target="_blank" class="twitter-share">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        </a>
                     </div>
                     <div class="social-shared-item">
                        <a href="#0" target="_blank" class="linkdin-share">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                     </div>
                     <div class="social-shared-item">
                        <a href="javascript:void(0)" class="linkdin-share">
                        <i class="far fa-envelope" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
                  <div class="group text-center">
                     <a href="{{ route('career.apply',$career->id) }}" class="default">Apply Now</a>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Job Description</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p><span style="color: rgb(0, 0, 0);">{{ $career->description }}</span></p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Job Responsibilities</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     {!! $career->responsibility !!}
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Primary Requirements</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     {!! $career->requirement !!}
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Experience</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->experience_year }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Job Location</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->address }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Educational Requirements</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->experience_year }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Job Type</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->job_type }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Shift</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->shift }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Department</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->job_type }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Salary Range</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->salary }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Benefits</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                       {!! $career->benefit !!}
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Photograph</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>Photograph must be enclosed with the Resume</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Application Deadline</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->deadline }}</p>
                  </div>
               </div>
            </div>
            <div class="description-block">
               <div class="row">
                  <div class="col-md-3 col-lg-2 offset-lg-1">
                     <h3>Additional Notes</h3>
                  </div>
                  <div class="col-md-7 col-lg-8">
                     <p>{{ $career->note }}</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 offset-lg-1">
                  <div class="apply">
                     <a href="job_application.html" class="default">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Job Offer-->

@endsection