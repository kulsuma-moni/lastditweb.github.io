@extends('layouts.app')

@section('title','Delwarit || Start a Project')

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
							<h1>Start A Project</h1>
							<ul>
								<li><a href="index.html">Home</a>
								</li>
								<li>/</li>
								<li>Project</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End About Inner Area-->
	<!--Start Project area-->
	<section class="project-wrapper-area-two">
		<div class="project-wrap">
			<div class="container">
				<form action="{{ route('start.new.project') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="project-area">
						<div class="row">
							<div class="col-lg-12">
								<div class="project-title">
									<h2>Let's create something great together.</h2>
									<div class="em-bar-main">
										<div class="em-bar em-bar-big"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input type="text" name="name" id="name" placeholder="Name" class="form-control" required  oninvalid="this.setCustomValidity('Enter Your Name')" oninput="this.setCustomValidity('')">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="email" placeholder="Email" class="form-control"  required  oninvalid="this.setCustomValidity('Enter Valid Email Here')" oninput="this.setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input type="number" name="phone" id="number" placeholder="Phone Number" class="form-control"  required  oninvalid="this.setCustomValidity('Enter Phone Number')" oninput="this.setCustomValidity('')">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input type="text" name="company_name" id="msg_subject" placeholder="Company/ Organisation Name" class="form-control">
									<div class="help-block with-errors text-danger"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="project-type">
									<h6>Type of project</h6>
									<p>Select all that apply</p>
									<div class="field clearfix">
										<div class="website">
											<input type="checkbox" value="Website" name="project_type1" id="type-website">
											<label for="type-website">Website</label>
										</div>
										<div>
											<input type="checkbox" value="Mobile / App" name="project_type2" id="type-mobile">
											<label for="type-mobile">Graphics Design</label>
										</div>
										<div>
											<input type="checkbox" value="eCommerce" name="project_type3" id="type-ecommerce">
											<label for="type-ecommerce">eCommerce</label>
										</div>
										<div>
											<input type="checkbox" value="Photography" name="project_type4"  id="type-photography">
											<label for="type-photography4">Digital Marketing</label>
										</div>
										<div>
											<input type="checkbox" value="Video" name="project_type5" id="type-video">
											<label for="type-video">Video</label>
										</div>
										<div>
											<input type="checkbox" value="Virtual Tours" name="project_type6" id="type-virtual-tours">
											<label for="type-virtual-tours">Web Design</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="project-type-one">
									<h6>Select Files</h6>
									<div class="field clearfix select">
										<input type="file" id="myfile" name="image[]" multiple>
										<br>
										<br>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="range">
									<h4>Budget</h4>
									<form method="post" action="#">
										<label for="currency-field">Enter Amount</label>
										<input type="text" name="budget" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
									</form>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="about-project">
									<h4>About Project</h4>
									<p>Describe the project, requirements and objectives.</p>
									<textarea id="about_project" name="description"></textarea>
									<div class="field">
										<input type="text" id="hear_about" name="reference" placeholder="How did you hear about us?">
									</div>
									<button type="submit" class="btn default">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!--End Project area-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
@endsection