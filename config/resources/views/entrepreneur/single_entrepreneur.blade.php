@extends('layouts.app')

@section('title','Delwarit | '{{-- .$entrepreneur->name --}})

@section('content')


<section class="single-banner-wrapper">
        <div class="job-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-content-area text-left">
                            <h4>Frelancers In {{ $entrepreneur->district->name }}</h4>
                            <h1>{{ $entrepreneur->name }}</h1>
                            <div class="p-text">
                                <p>{{ $entrepreneur->profession }}</p>
                            </div>
                            <p class="p-text1">{!! Str::words($entrepreneur->career_obj,10,'..') !!}</p>
                            <div class="video-icon">
                                <a class="video-vemo-icon venobox vbox-item" target="_blank" data-vbtype="youtube" data-autoplay="true" href="{{ $entrepreneur->link }}"><i class="fas fa-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-thumb">
                    <div class="hero-thumb-inner">
                        <img src="{{ asset('storage/app/public/'.$entrepreneur->image) }}" alt="slider-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="experience-wrapper-area">
        <div class="experience-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="image">
                            <img src="{{ asset('storage/app/public/'.$entrepreneur->image2) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-content">
                            <div class="title">
                                <h2>entrepreneur Experience</h2>
                                <div class="em-bar-main">
                                    <div class="em-bar em-bar-big"></div>
                                 </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                {!! $entrepreneur->expert_in !!}
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
                        <p>{{ $entrepreneur->career_obj }}</p>
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
                            <img src="{{ asset('storage/app/public/'.$entrepreneur->image3) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-item">
                            <h1>Be A Frelancer</h1>
                            <div class="em-bar-main">
                                <div class="em-bar em-bar-big"></div>
                             </div>
                             <p>{!! $entrepreneur->description !!}</p>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection