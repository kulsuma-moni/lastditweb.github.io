@extends('layouts.app')

@section('title','Delwarit | Services')

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
	<section class="service_content_area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="top_titel text-center">
						<h2>Services We Provide</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/webdesign.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>Web design & development</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/app.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>Aplication Development</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/graphics.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>Graphics Design</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/digital.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>Digital Marketing</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/ux.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>UX/UI Designing</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="service_box">
						<div class="icon_box">
							<img src="{{ asset('public/frontend/assets/images/video.png') }}" alt="">
						</div>
						<div class="titel">
							<h3>Video Editing</h3>
						</div>
						<div class="details">
							<p>Lorem ipsum dolor sit amet, cosectetur adipisicing elit, sed deimod empor inddunt ut ualor sit amet</p>
						</div>
						<div class="service_details_btn">
							<a href="#" class="btn details_btn">learn more <i class="fas fa-arrow-right"></i></a>
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