@php
$setting = App\Models\Admin\Setting::first();
@endphp
@extends('layouts.app')
@section('title','Delwarit | Job Apply')

@section('content')

  <!--Start job Apply Requer Information Area-->
  <section class="job_apply_requer_info_area">
      <div class="container">
          <div class="row">
            <form action="{{ route('career.application') }}" method="post" enctype="multipart/form-data" id="form" class="form">
            	@csrf
	            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 m-auto">
	                <div class="aplicant_img_up profile-badge">
	                    <div class="info_title">
	                        <h6>Applicant required {{ $career->title }} {{ $career->id }} information</h6>
	                    </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Apply successfull for {{ $career->title }} post.
                    </div>
                @endif
                @if(session('wrong'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('wrong')}}.
                    </div>
                @endif
	                    <div class="profile-pic">
	                        <img alt="" class="im_g" src="{{ asset('public/frontend/assets/images/user.png') }}" id="profile-image1">
	                        <p for="" class="text-danger">Image dimension (300X300)</p>
	                        <input id="profile-image-upload" class=" @error('image') is-invalid @enderror" name="image" type="file" onchange="previewFile()" >

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} It's 300x300</strong>
                            </span>
                            @enderror
	                        <input type="hidden" name="career_id" value="{{ $career->id }}">
	                        @guest
	                        @else
	                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	                        @endguest
	                       {{--  <div class="right_content">
	                            <img src="{{ asset('public/frontend/assets/images/cloud-computing.png') }}" alt="upload icon">
	                            <span>upload image</span>
	                        </div> --}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
	                        <div class="aplicant_info">
	                                <div class="form-group">
	                                    <label>full name</label>
	                                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="full_name" placeholder="Full Name" value="{{ Auth::user()->name }}">
		                                @error('name')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                                @enderror
	                                </div>
	                                <div class="form-group">
	                                    <label>Email</label>
	                                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Your Email Address" value="{{ Auth::user()->email }}">
		                                @error('email')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                                @enderror
	                                </div>
	                                <div class="form-group">
	                                    <label>Expected Salary</label>
	                                    <input type="number" name="expect_salary" class="form-control  @error('salary') is-invalid @enderror" id="email" placeholder="Your Expected Salary">
		                                @error('expect_salary')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                                @enderror
	                                </div>
	                        </div>
	                    </div>
	                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
	                        <div class="aplicant_info">
	                                <div class="form-group">
	                                    <label>phone</label>
	                                    <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" id="phone_number" placeholder="Your Phone Number">
		                                @error('phone')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                                @enderror
	                                </div>
	                                <div class="form-group">
	                                    <label>upload your resume</label>
	                                    <input type="file" name="file" class="form-control  @error('file') is-invalid @enderror" id="resume">
	                                </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="submit_btn text-center">
	                    <button href="" class="btn aply_submit" type="submit">Submit</button>
	                </div>
	            </div>
            </form>
          </div>
          
      </div>
  </section>

  <!--End job Apply Requer Information Area-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
@endsection