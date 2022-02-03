@extends('layouts.app')

@section('title','Delwarit | About')

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
                        <h1>courses</h1>
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li>/</li>
                           <li>courses</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End About Inner Area-->
      <!-- Course Sell Area Start -->
      <div class="course_sell_area">
         <div class="container">
		 <div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="new_post_filter_btn text-center">
						<ul>
							<li><a href="#0" class="btn default" data-filter>all</a></li>
							<li><a href="#0" class="btn default" data-filter="design">design</a></li>
							<li><a href="#0" class="btn default" data-filter="marketing">digital marketing</a></li>
							<li><a href="#0" class="btn default" data-filter="applicaction">application development</a></li>
							<li><a href="#0" class="btn default" data-filter="basic">basic computer</a></li>
							<li><a href="#0" class="btn default" data-filter="content">content writing</a></li>
						</ul>
					</div>
				</div>
			</div>
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="design">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="marketing">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="applicaction">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="basic">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="content">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="design">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="marketing">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
			   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                     <div class="course_sell_box" data-tags="basic">
                        <div class="course_img">
                              <img src="{{asset('public/frontend/assets/images/course_sell.png')}}" alt="" class="img-fluid">
                        </div>
						<div class="detail">
							<div class="cat_nam">
								<span>web design & development</span>
							</div>
							<div class="course_titel">
								<a href="#">
									<h3 class="titel">Complete web design & development with practical project</h3>
								</a>
							</div>
							<div class="rate_price_box">
								<div class="rating">
									<span>5</span>
									<ul>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
										<li><a href="#"><i class="fas fa-star"></i></a></li>
									</ul>
								</div>
								<div class="price">
									<span>৫০০০ টাকা</span>
								</div>
							</div>
						</div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Course Sell Area End -->

@endsection