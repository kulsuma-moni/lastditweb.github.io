@extends('layouts.app')
<style>
		/*================================================
Portfolio Area CSS
=================================================*/
.portfolio-wrapper-area {
  padding: 100px 0px 50px 0px;
  background: #f1f0f8;
}

.portfolio-wrapper-area hr {
  display: none;
}

.portfolio-wrapper-area .portfolio-content {
  margin-top: 40px;
  cursor: pointer;
  border-radius: 5px;
  -webkit-transition: .4s;
  transition: .4s;
}

.portfolio-wrapper-area .portfolio-content:hover .portfolio-inner i {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
  background: linear-gradient(120deg, #1c99fe 20.69%, #7644ff 50.19%, #fd4766 79.69%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.portfolio-wrapper-area .portfolio-content:hover .portfolio-image img {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}

.portfolio-wrapper-area .portfolio_btn {
  border-bottom: 0;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  margin: 0 auto;
}

.portfolio-wrapper-area .portfolio_btn li {
  margin-left: 10px;
  display: inline;
}

.portfolio-wrapper-area .portfolio_btn .brn_btn {
  border: none;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  background: transparent;
  border: 1px solid #0077b6;
  color: #fff;
  background: #0077b6;
  padding: 12px 12px;
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  font-weight: 600;
  -webkit-transition: .4s;
  transition: .4s;
}

.portfolio-wrapper-area .portfolio_btn .brn_btn.active {
  background: #fff !important;
  border: 1px solid #0077b6 !important;
  color: #0077b6 !important;
}

.portfolio-wrapper-area .portfolio-image img {
  border: 1px solid #fff;
  border-radius: 5px;
  -webkit-transition: .6s;
  transition: .6s;
}

.portfolio-wrapper-area .portfolio-inner .cart {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.portfolio-wrapper-area .portfolio-inner p a {
  color: #023e8a;
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  font-weight: 500;
}

.portfolio-wrapper-area .portfolio-inner i {
  color: #023e8a;
  font-size: 20px;
  position: relative;
  left: -90px;
  display: none;
}

.portfolio-wrapper-area .portfolio-inner h4 {
  font-size: 25px;
  color: #3d405b;
  padding-top: 15px;
}
	</style>
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
							<h1>Portfolio</h1>
							<ul>
								<li><a href="index.html">Home</a>
								</li>
								<li>/</li>
								<li>Portfolio</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End About Inner Area-->
	<!--Strat Portfolio area-->
	<section class="portfolio-wrapper-area">
		<div class="portfolio-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="portfolio_btn filter_btn">
							<li class="brand_item" data-filter="*">
								<button class="brn_btn active">All Works</button>
							</li>
							@foreach($portfoliocates as $portfoliocate)
							<li class="brand_item" data-filter=".{{ $portfoliocate->slug }}">
								<button class="brn_btn">{{ $portfoliocate->name }}</button>
							</li>
							@endforeach
						</ul>
						<div class="portfolio_list">
							<div class="row house_iso_list">
								@foreach($portfolios as $portfolio)
								<div class="col-lg-4 col-sm-6 col-md-6 grid-item {{ $portfoliocate->slug }}">
									<div class="portfolio-content">
										<a class="popup-youtube" href="{{$portfolio->link}}">
											<div class="portfolio-image">
												<img src="{{ asset('storage/app/public/'.$portfolio->image) }}" alt="" class="img-fluid">
											</div>
										</a>
										<hr>
										<div class="portfolio-inner">
											<h4>{{ $portfolio->name }}</h4>
											<div class="cart">
												<p><a href="{{$portfolio->link}}">Preview→</a>
												</p>
											</div>
										</div>
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
	<!--End Portfolio area-->
	<!--<section class="project-wrapper-area">-->
	<!--	<div class="project-wrap">-->
	<!--		<div class="container">-->
	<!--			<div class="row">-->
	<!--				<div class="col-md-12">-->
	<!--					<div class="project-information text-center">-->
	<!--						<h5>01722892349</h5>-->
	<!--						<h2>Start a project with us!</h2>-->
	<!--						<div class="project-box"> <a href="project.html" class="default">Start a project</a>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</section>-->
	<!-- Links of JS file -->
	<script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('public/frontend/assets/js/jquery.min.js')}}"></script>
	<!--=== Isotop Filtering JS===-->
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script>
		// PORTFOLIO PAGE ISOTOP FILTER START
var $grid3 = $('.house_iso_list').isotope({
	itemSelector: '.grid-item',
	percentPosition: true,
	masonry: {
	  // use outer width of grid-sizer for columnWidth
	  columnWidth: 1,
	  columnHeight:1665
	}
  });
  // portfolio filter items on button click
$('.filter_btn').on( 'click', '.brand_item', function() {
	var filterValue = $(this).attr('data-filter');
	$grid3.isotope({ filter: filterValue });
});
  // portfolio filter items on button click
  $('.brn_btn').click(function(){
		$('.brn_btn').removeClass("active");
		$(this).addClass("active");
	});
		
	</script>
	@endsection
