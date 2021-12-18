@extends('layouts.app')

@section('title','Delwarit | Services')

@section('content')
	<!--Start About Inner Area-->
	<section class="about-wrapper-inner">
		<div class="about-wrap">
			<div class="container">
				<div class="ellipse1">
					<img src="assets/images/Ellipse1.svg" alt="" class="img-fluid">
				</div>
				<div class="ellipse2">
					<img src="assets/images/Ellipse2.svg" alt="" class="img-fluid">
				</div>
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="inner-content">
							<h1>Services</h1>
							<ul>
								<li><a href="index.html">Home</a>
								</li>
								<li>/</li>
								<li>Services</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End About Inner Area-->
	<!--Start Service content area-->
	<section class="service-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="service-sidebar">
						<div class="menu-service">
							<ul>
								@foreach($services as $service)
								<li><a href="{{ route('single.service',$service->slug) }}">{{ $service->title }}</a>
								</li>
								@endforeach
							</ul>
						</div>
						<div class="service-content-box">
							<div class="service-title">
								<h3>Need Any Help For Business ?</h3>
								<p>Lorem ipsum dolor sit amet, consectetur sed adipiscing elit.</p>
								<div class="box-btn"> <a href="contact.html" class="default">Contact Us</a>
								</div>
							</div>
						</div>
						@if(session('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> {{session('success')}}.
                          </div>
                        @endif
						<h4>Counselling Area</h4>
						<form  action="{{ route('create.contact') }}" method="post">
							 @csrf
							
                           <input type="text" placeholder="Your Name" name="name" value="" class="form-control " required  oninvalid="this.setCustomValidity('Enter Your Name Here')"
							    oninput="this.setCustomValidity('')">

                           <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  " >
                           <input type="email" placeholder="Email Address" name="email" value="" class="form-control  " required  oninvalid="this.setCustomValidity('Enter Valid Email Here')"
							    oninput="this.setCustomValidity('')">
                           <input type="hidden" value="2" name="devide">
                           <div class="form-floating">
                              <textarea class="form-control" name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"  required  oninvalid="this.setCustomValidity('Write a message here')"
							    oninput="this.setCustomValidity('')"></textarea>
                              <label for="floatingTextarea2">Comments</label>
                           </div>
                           <button type="submit" class="btn  default">Submit</button>
						</form>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="service-area">
						<div class="service-image">
							@if($lastservice)<img src="{{ asset('storage/app/public/'.$lastservice->image) }}" alt="" class="img-fluid">@endif
						</div>
						<div class="service-content">
							<h4>@if($lastservice){{ $lastservice->title }}@endif</h4>
							@if($lastservice){!! $lastservice->description !!}@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End Service content area-->
	<!--Start project section-->
	<section class="project-wrapper-area">
		<div class="project-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="project-information text-center">
							<h5>01722892349</h5>
							<h2>Start a project with us!</h2>
							<div class="project-box"> <a href="project.html" class="default">Start a project</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End Project section-->
	<!--Start Box area-->
	<section class="box-wrapper-area">
		<div class="container">
			<div class="process-inner-box">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-process"> <i class="fab fa-researchgate"></i>
							<p>Research</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-process bg-36CC72"> <i class="fas fa-diagnoses"></i>
							<p>Analyze</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-process bg-FF414B"> <i class="fas fa-pencil-ruler"></i>
							<p>Design</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="single-process bg-FF6D3D"> <i class="fas fa-comment"></i>
							<p>Testing</p>
						</div>
					</div>
				</div>
				<div class="process-bar-shape">
					<img src="assets/images/process-bar.png" alt="image">
				</div>
			</div>
		</div>
	</section>
	<!--End Box area-->

	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>

@endsection