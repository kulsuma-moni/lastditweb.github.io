@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="breadcrumb-contain">
          <div>
            <h2>Shops</h2>
            <ul>
              <li><a href="{{ route('/') }}">home</a></li>
              <li><i class="fab fa-accusoft"></i></li>
              <li><a href="{{ URL::current() }}">Brand</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space ratio_asos b-g-light">
  <div class="collection-wrapper">
    <div class="custom-container">
      <div class="row">
        <div class="col-sm-3 collection-filter category-side category-page-side">
          <!-- side-bar colleps block stat -->
          <div class="collection-filter-block creative-card creative-inner category-side">
            <!-- category filter start -->
            <div class="collection-mobile-back">
              <span class="filter-back"><i data-feather="arrow-left"></i> back</span></div>
            <div class="collection-collapse-block open">
              <h3 class=" mt-0">Categorys</h3>
              <div class="collection-collapse-block-content">
                <div class="collection-category-filter">
                	@php 
                	$categorys = App\Models\Admin\Category::latest()->get();
                	@endphp
                	@foreach($categorys  as $category)
                	<a href="{{ route('category.product',$category->slug) }}">
                  <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">

                    <img src="{{ asset('storage/'.$category->image) }}" alt="" height="12px" width="12px" class="rounded-circle">
                    <label class="custom-control-label form-check-label" for="zara">{{ $category->name }}</label>
                  </div>
                  </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- silde-bar colleps block end here -->


          <!-- side-bar colleps block stat -->
          <div class="collection-filter-block creative-card creative-inner category-side">
            <!-- brand filter start -->
            <div class="collection-mobile-back">
              <span class="filter-back"><i data-feather="arrow-left"></i> back</span></div>
            <div class="collection-collapse-block open">
              <h3 class=" mt-0">brands</h3>
              <div class="collection-collapse-block-content">
                <div class="collection-brand-filter">
                  @php 
                  $brands = App\Models\Admin\Brand::latest()->get();
                  @endphp
                  @foreach($brands  as $brand)
                  <a href="{{ route('brand.product',$brand->slug) }}">
                  <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">

                    <img src="{{ asset('storage/'.$brand->image) }}" alt="" height="12px" width="12px" class="rounded-circle">
                    <label class="custom-control-label form-check-label" for="zara">{{ $brand->name }}</label>
                  </div>
                  </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- silde-bar colleps block end here -->
          <!-- side-bar single product slider start -->
          <div class="theme-card creative-card creative-inner">
            <h5 class="title-border">new product</h5>
            <div class="slide-1">
              <div>
                <div class="media-banner plrb-0 b-g-white1 border-0">
                	@foreach($products as $product)
                  <div class="media-banner-box">
                    <div class="media">
                      <a href="{{ route('single.product',$product->slug) }}" tabindex="0">
                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid " alt="banner">
                      </a>
                      <div class="media-body">
                        <div class="media-contant">
                          <div>
                            <div class="product-detail">
                           {{--    <ul class="rating">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                              </ul> --}}
                              <a href="{{ route('single.product',$product->slug) }}" tabindex="0"><p>{{ $product->name }}</p></a>
                              <h6><span>{{ $product->price }}</span></h6>
                            </div>
                            <div class="cart-info">
                              <a href="javascript:void(0)" class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <i class="fas fa-cart-plus"></i></a>
                              <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" > <i class="far fa-heart"></i></a>
                              <a href="{{ route('single.product',$product->slug) }}"  data-tippy-content="Quick View"> <i class="fas fa-eye"></i> </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- side-bar single product slider end -->
          <!-- side-bar banner start here -->
    {{--       <div class="collection-sidebar-banner">
            <a href="javascript:void(0)"><img src="../assets/images/category/side-banner.png" class="img-fluid " alt="side-banner"></a>
          </div> --}}
          <!-- side-bar banner end here -->
        </div>
        <div class="collection-content col">
          <div class="page-main-content">
            <div class="row">
              <div class="col-sm-12">
                <div class="collection-product-wrapper">
                  <div class="product-wrapper-grid product-load-more product">
                    <div class="row">
                    	@foreach($products as $product)
                      <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                        <div class="product-box">
                          <div class="product-imgbox">
                            <div class="product-front">
                              <a href="product-page(left-sidebar).html"> <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid  " alt="product"> </a>
                            </div>
                            <div class="product-back">
                              <a href="{{ route('single.product',$product->slug) }}"> <img src="{{ asset('storage/'.$product->image2) }}" class="img-fluid  " alt="product"> </a>
                            </div>


                          </div>
                          <div class="product-detail detail-center detail-inverse">
                            <div class="detail-title">
                              <div class="detail-left">
                                <div class="rating-star"> </div>
                                <a href="{{ route('single.product',$product->slug) }}">
                                  <h6 class="price-title">
                                    {{ $product->name }}
                                  </h6> </a>
                              </div>
                              <div class="detail-right">
                                <div class="check-price"> </div>
                                <div class="price">
                                  <div class="price"> {{ $product->price }} </div>
                                </div>
                              </div>
                            </div>
                            <div class="icon-detail">
                              <button class="tooltip-top add-cartnoty" data-tippy-content="Add to cart"> <i class="fas fa-cart-plus"></i></button>
                              <a href="javascript:void(0)"  class="add-to-wish tooltip-top"  data-tippy-content="Add to Wishlist" > <i class="far fa-heart"></i></a>
                              <a href="{{ route('single.product',$product->slug) }}" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"  data-tippy-content="Quick View"> <i class="fas fa-eye"></i> </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">load more</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section End -->
@endsection
