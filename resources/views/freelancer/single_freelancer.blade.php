@extends('layouts.app')

@section('title','Delwarit | '{{-- .$freelancer->name --}})

@section('content')


<section class="single-banner-wrapper">
        <div class="job-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-content-area text-left">
                            <h4>Frelancers In {{ $freelancer->district->name }}</h4>
                            <h1>{{ $freelancer->name }}</h1>
                            <div class="p-text">
                                <p>{{ $freelancer->profession }}</p>
                            </div>
                            <p class="p-text1">{{ Str::words($freelancer->career_obj,'10') }}</p>
                            <div class="video-icon">
                                <a class="video-vemo-icon venobox vbox-item" target="_blank" data-vbtype="youtube" data-autoplay="true" href="{{ $freelancer->link }}"><i class="fas fa-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-thumb">
                    <div class="hero-thumb-inner">
                        <img src="{{ asset('storage/app/public/'.$freelancer->image) }}" alt="slider-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="experience-wrapper-area">
        <div class="experience-wrap">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-6">
                        <div class="image">
                            <img src="{{asset('public/frontend/assets/images/1.png')}}" alt="" class="img-fluid">
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="image">
                                    <img src="{{asset('public/frontend/assets/images/1.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="inner-content">
                                    <div class="title">
                                        <h2>Freelancer Experience</h2>
                                        <div class="em-bar-main">
                                            <div class="em-bar em-bar-big"></div>
                                        </div>
                                    </div>
                                </div>
                                <p>{!! $freelancer->expert_in !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="single-content-area">
        <div class="single-content-wrap">
            <div class="container">
                <div class="row">
                    <div class="text">
                        <p>{{ $freelancer->career_obj }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="single-wrapper-area">
        <div class="single-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="image">
                        <img src="{{asset('public/frontend/assets/images/1.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-item">
                            <h1>Be A Frelancer</h1>
                            <div class="em-bar-main">
                                <div class="em-bar em-bar-big"></div>
                             </div>
                             <p>{!! $freelancer->description !!}</p>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection