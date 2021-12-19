@php
$setting = App\Models\Admin\Setting::first();
@endphp
@extends('layouts.app')
@section('title','Delwarit | Jobs')

@section('content')

	<section class="job-banner-wrapper">
		<div class="job-wrap">
			<div class="container">
				<div class="ellipse1">
					<img src="assets/images/Ellipse1.svg" alt="" class="img-fluid">
				</div>
				<div class="ellipse2">
					<img src="assets/images/Ellipse2.svg" alt="" class="img-fluid">
				</div>
				<div class="row align-items-center">
					<div class="col-lg-8">
						<div class="title">
							<h1>Find your dream jobs with us easily</h1>
							<form class="form">
								<div class="input-wrap">
									<input id="search-jobs" class="form-control" name="search" type="text" placeholder="Search by job title, keyword or phrase....">
								</div>
								<div class="search-btn">
									<button class="default" type=submit>Search job</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="job-area">
							<div class="image">
								<img src="{{ asset('public/frontend/assets/images/thumb.jpg') }}" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="job-area-wrapper">
		<div class="job-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="team text-center">
							<h2>Be a Part of Delwar It's Growing Team.</h2>
							<p>"Make an impact doing what you love."</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							<h6>Job Type</h6>
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Full Time(11)</button>
							</li>
							<h6>Department</h6>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">All</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Design</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Development</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact4" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Marketing</button>
							</li>
							<h6>Job Shift</h6>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact6" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">All</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-one-tab" data-bs-toggle="pill" data-bs-target="#pills-one" type="button" role="tab" aria-controls="pills-one" aria-selected="false">Flexible(1)</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-two-tab" data-bs-toggle="pill" data-bs-target="#pills-two" type="button" role="tab" aria-controls="pills-two" aria-selected="false">Day Shift(10)</button>
							</li>
							<h6>Location</h6>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-three-tab" data-bs-toggle="pill" data-bs-target="#pills-three" type="button" role="tab" aria-controls="pills-three" aria-selected="false">All</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Temporarily Remote</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-five-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">Remote</button>
							</li>
						</ul>
					</div>
					<div class="col-lg-8 nav-area">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="row">
									<div class="col-lg-12">
										<div class="area">
											<div class="nav-title">
												<h3>@if($careers) {{ count($careers) }} @endif Jobs Found</h3>
												<p>Displayed Here: 1 - 10 Jobs Most Recent</p>
											</div>
											<select class="form-select" aria-label="Default select example">
												<option selected>Most Recent</option>
												<option value="2">Most View</option>
												<option value="3">Alphabetically</option>
											</select>
										</div>
									</div>
								</div>
								@foreach($careers as $career)
								<div class="row">
									<div class="col-lg-12">
										<a href="{{ route('single.career',$career->slug) }}">
											<div class="job-content">
												<h5>{{ $career->title }}</h5>
												<p>{{ Str::words($career->description ,20,'...') }}</p>
												<div class="job-post-meta-group"> <span class="job-post-meta">
                                        <i class="fas fa-box"></i>
                                        <span>{{ $career->job_type }}</span>
													</span> <span class="job-post-meta">
                                        <i class="fas fa-calendar-week"></i>
                                        <span>{{ $career->created_at->format('d F,Y') }}</span>
													</span> <span class="job-post-meta">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $career->address }}</span>
													</span>
												</div>
											</div>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection