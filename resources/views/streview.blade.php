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
                        <h1>Successful Students</h1>
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li>/</li>
                           <li>student review</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End About Inner Area-->
      <!-- Student Review Area Start -->
      <div class="student_review_area">
         <div class="container">
			 <div class="row">
			 	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots1">...</span><span id="re_text1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore1()" id="red_mo1">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots2">...</span><span id="re_text2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore2()" id="red_mo2">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots3">...</span><span id="re_text3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore3()" id="red_mo3">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots4">...</span><span id="re_text4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore4()" id="red_mo4">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots5">...</span><span id="re_text5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore5()" id="red_mo5">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
            	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="student_review_box">
						<div class="student_img_text">
							<div class="student_img">
								<img src="{{ asset('public/frontend/assets/images/portrait-handsome-smiling-stylish-hipster-lumbersexual-businessman-model-man-dressed-jeans-jacket-clothes.jpg') }}" alt="" class="img-fluid">
							</div>
							<div class="text">
								<p> Reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid<span id="dots6">...</span><span id="re_text6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, sint pariatur commodi dolor ipsa ut voluptatibus. Quod qui delectus excepturi veniam deleniti nostrum reiciendis pariatur tempora eos. Sequi magnam adipisci molestias reiciendis expedita. Laborum cumque aperiam, aspernatur exercitationem asperiores corrupti hic dolores, perspiciatis aliquid officiis ab. Libero, obcaecati accusamus nobis corrupti enim molestiae officiis reprehenderit unde est, ipsa, quod nam?
								</span></p>
								<div class="btn-container">
									<button onclick="redmore6()" id="red_mo6">Read More</button>
								</div>
							</div>
						</div>
						<div class="student_info">
							<div class="student_nam">
								<h4>abdul wakil</h4>
								<span>application developer</span>
							</div>
							<div class="batch">
								<span>batch 6</span>
							</div>
						</div>
					</div>
				</div>
			 </div>
			 <div class="row">
			 <div class="pagination_container">
                     <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                           <li class="page-item disabled">
                              <a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a>
                           </li>
                           <li class="page-item active"><a class="page-link" href="#">1</a></li>
                           <li class="page-item" aria-current="page">
                              <a href="#" class="page-link">2</a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                           </li>
                        </ul>
                     </nav>
                  </div>
			 </div>
		 </div>
      </div>
      <!-- Student Review Area End -->

@endsection