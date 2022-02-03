@extends('layouts.app')

@section('title','Delwarit | Blogs')

@section('content')


      <!--Start About Inner Area-->
      <section class="job-banner-wrapper">
        <div class="job-wrap">
           <div class="container">
              <div class="row align-items-center">
                 <div class="col-lg-12 mx-auto">
                    <div class="title text-center blog_page_titel">
                        {{-- <h1 style="font-size:46px;">Welcome</h1> --}}
                        <form class="search-form" action="{{ route('search') }}" method="post">
                            @csrf
                            <div class="input-group mb-3 input-group-lg">
                             <input type="text" class="form-control" name="search" placeholder="Search">
                             <button class="btn btn-success default" type="submit">Search</button>
                           </div>
                        </form>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
      <!--Start Blog content area-->
      <section class="blog_page_ctn">
         <div class="container">
            <div class="row">

               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="blog_top_post_left blog_box">
                        <div class="blog_img">
                           <a href="{{ route('single.blog',$lastblog->slug) }}">
                           <img src="{{ asset('storage/app/public/'.$lastblog->image) }}" alt="{{ $lastblog->title }}"></a>
                        </div>
                        <div class="blog_info">
                           <div class="titel">
                              <a href="{{ route('single.blog',$lastblog->slug) }}">
                              <h3>{{ Str::words($lastblog->title,11,'...') }}</h3></a>
                           </div>
                           <div class="detail_info">
                              <ul>
                                 <li>
                                    <img src="{{ asset('public/frontend/assets/images/Vector(1).png') }}" alt="{{ $lastblog->title }}">
                                    @foreach($lastblog->blogcate as $blogcate)
                                       <a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }}</a> 
                                    @endforeach
                                  </li>
                                 <li>
                                    <img src="{{ asset('public/frontend/assets/images/Vector.png') }}" alt="">
                                    <a href="#">{{ $lastblog->created_at->format('d F,Y') }}</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="author_info">
                              <div class="author_img">
                                 @if($lastblog->user->image)
                                 <img src="{{asset('storage/app/public/'.$lastblog->user->image)}}" alt="{{ $lastblog->user->name }}">
                                 @else

                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                 @endif
                              </div>
                              <div class="author_details">
                                 <h6>{{ $lastblog->user->name }}</h6>
                                 <span>Top Rated Freelancer</span>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  @foreach($pupularblogs as $popularblog)
                  <div class="blog_top_post_right blog_box">
                     <div class="row">
                        <div class="col-md-5 py-0">
                           <div class="blog_img"><a href="{{ route('single.blog',$popularblog->slug) }}">
                              <img src="{{ asset('storage/app/public/'.$popularblog->image) }}" alt="{{ $popularblog->title }}"></a>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="blog_info">
                              <div class="titel">
                                 <a href="{{ route('single.blog',$popularblog->slug) }}">
                                 <h3>{{ Str::words($popularblog->title,11,'...') }}</h3></a>
                              </div>
                              <div class="detail_info">
                                 <ul>
                                    <li>
                                       <img src="{{ asset('public/frontend/assets/images/Vector(1).png') }}" alt="">
                                          @foreach($popularblog->blogcate as $blogcate)
                                             <a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }}</a> 
                                          @endforeach
                                    </li>
                                    <li>
                                       <img src="{{ asset('public/frontend/assets/images/Vector.png') }}" alt="">
                                       <a href="#">{{ $popularblog->created_at->format('d F,Y') }}</a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="author_info">
                                 <div class="author_img">
                                    @if($popularblog->user->userdetail)
                                    @if($popularblog->user->userdetail->image)
                                    <img src="{{asset('storage/app/public/'.$popularblog->user->userdetail->image)}}" alt="" style="height:56px; width: 56px; border-radius: 15px;">
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                                 </div>
                                 <div class="author_details">
                                    <h6>{{ $popularblog->user->name }}</h6>
                                    @if($popularblog->user->userdetail)
                                    <span>{{ Str::words($popularblog->user->userdetail->profession ,'3','..') }}</span>
                                    @endif
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
      </section>
      <!-- <section class="blog-content-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                    @foreach($blogs as $blog)
                      <div class="content-area">
                         <div class="blog-image">
                            <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="" class="img-fluid">
                         </div>
                         <div class="item-content">
                            <h3><a href="{{ route('single.blog',$blog->slug) }}">{{ $blog->title }}</a></h3>
                            <p>{{ Str::words(strip_tags($blog->description),'25','...') }}</p>
                            <a href="{{ route('single.blog',$blog->slug) }}" class="default">Read More</a>
                         </div>
                      </div>
                    @endforeach
                  <div class="pagination-area text-center">
                     <a class="prev page-numbers" href="#0">
                        <i class="fas fa-chevron-left"></i>
                     </a>
                     <span class="page-numbers current" aria-current="page">1</span>
                     <a class="page-numbers" href="#0">2</a>
                     <a class="page-numbers" href="#0">3</a>
                     <a class="page-numbers" href="#0">4</a>
                     <a class="next page-numbers" href="#0">
                        <i class="fas fa-chevron-right"></i>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <form role="search" method="get" class="search-form">
                     <label>
                     <span class="screen-reader-text">Search for:</span>
                     <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                     </label>
                     <input type="submit" class="search-submit" value="Search">
                  </form>
                  <div class="recent">
                     <h4>Recent</h4>
                     <ul class="clearfix">
                        @foreach($pupularblogs as $blog)
                        <li>
                           <div class="small-blog clearfix">
                              <a href="#" class="item-image">
                                @if($blog->image)
                                    <img width="130" height="110" src="{{ asset('storage/app/public/'.$blog->image) }}" alt="" class="img-fluid">
                              @else
                              <img width="130" height="110" src="{{ asset('public/frontend/assets/images/noimage.jpg') }}" alt="" class="img-fluid">
                                @endif
                              </a>
                              <div class="item-content">
                                 <span class="post-date">May 3, 2020</span>
                                 <h4 class="item-title mb-0">
                                    <a href="#0">{{$blog->title}}</a>
                                 </h4>
                              </div>
                           </div>
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="catagories">
                     <h4>Catagories</h4>
                     <ul>
                        @foreach($blogcates as $blogcate)
                        <li> <a href="">{{ $blogcate->name }}</a> </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="archive">
                     <h4>Archive</h4>
                     <ul>

            @foreach($result as $dt)
                @php
                    $archcount = App\Models\Admin\Blog::where('month', $dt->format("F-Y"))->count();
                @endphp
                @if($archcount > 0)
                    <li><a href="">{{ $dt->format("F-Y") }}<span class="post-count">({{ $archcount }})</span></a>
                </li>
                @endif
            @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
      <!--End Blog content area-->
      <!-- Start Trending Post Area -->
      <section class="trendy_post_area">
         <div class="container">
            <div class="row">
               <div class="review-title text-center">
                  <h2>Trendy post</h2>
                  <div class="em-bar-main">
                     <div class="em-bar em-bar-big"></div>
                  </div>
                  <p>We are the makers of Future Leaders!</p>
               </div>
            </div>
            <div class="row">
               @foreach($trends as $blog)
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="trendy_post_box">
                     <div class="tp_img">
                        <a href="{{ route('single.blog',$blog->slug) }}">
                        <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="{{ $blog->title }}"></a>
                     </div>
                     <div class="blog_info">
                        <div class="titel">
                           <a href="{{ route('single.blog',$blog->slug) }}">
                           <h3>{{ Str::words($blog->title,'11','...') }}</h3></a>
                        </div>
                        <div class="detail_info">
                           <ul>
                              <li>
                                 <img src="{{ asset('public/frontend/assets/images/Vector(1).png') }}" alt="">
                                 @foreach($blog->blogcate as $blogcate)<a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }}</a>@endforeach
                              </li>
                              <li>
                                 <img src="{{ asset('public/frontend/assets/images/Vector.png') }}" alt="">
                                 <a href="#">{{ $blog->created_at->format('d F,Y') }}</a>
                              </li>
                           </ul>
                        </div>
                        <div class="author_info">
                           <div class="author_img">  
                              @if($blog->user->userdetail)
                                 @if($blog->user->userdetail->image)
                                 <img src="{{asset('storage/app/public/'.$blog->user->userdetail->image)}}" alt="" style="height:56px; width: 56px; border-radius: 15px;">
                                 @else
                                 <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                 @endif
                                 @else
                                 <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                              @endif
                           </div>
                           <div class="author_details">
                               <h6>{{ Str::words($blog->user->name,3,'...')  }}</h6>
                                 @if($blog->user->userdetail) <span>{{ Str::words($blog->user->userdetail->profession ,'3','..') }}</span> @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               @endforeach
            </div>
            <div class="row">
               @foreach($importents as $blog)
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="trendy_post_box trendy_box">
                     <div class="tp_img">
                        <a href="{{ route('single.blog',$blog->slug) }}">
                        <img src="{{ asset('storage/app/public/'.$blog->image) }}" style="border-radius:30px 30px 0px 0px;" alt="{{ $blog->title }}"></a>
                     </div>
                     <div class="blog_info">
                        <div class="titel">
                           <a href="{{ route('single.blog',$blog->slug) }}">
                           <h3>{{ Str::words($blog->title,'11','...') }}</h3></a>
                        </div>
                        <div class="detail_info">
                           <ul>
                              <li>
                                 <img src="{{ asset('public/frontend/assets/images/Vector(1).png') }}" alt="">
                                 @foreach($blog->blogcate as $blogcate)<a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }}</a>@endforeach
                              </li>
                              <li>
                                 <img src="{{ asset('public/frontend/assets/images/Vector.png') }}" alt="">
                                 <a href="#">{{ $blog->created_at->format('d F,Y') }}</a>
                              </li>
                           </ul>
                        </div>
                        <div class="author_info">
                           <div class="author_img">  
                              @if($blog->user->userdetail)
                                 @if($blog->user->userdetail->image)
                                 <img src="{{asset('storage/app/public/'.$blog->user->userdetail->image)}}" alt="" style="height:56px; width: 56px; border-radius: 15px;">
                                 @else
                                 <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                 @endif
                                 @else
                                 <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                              @endif
                           </div>
                           <div class="author_details">
                               <h6>{{ Str::words($blog->user->name,3,'...')  }}</h6>
                                 @if($blog->user->userdetail) <span>{{ Str::words($blog->user->userdetail->profession ,'3','..') }}</span> @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- End Trending Post Area -->
      <!-- Start New Post Area -->
      <section class="trendy_post_area">
         <div class="container">
            <div class="row">
               <div class="review-title text-center">
                  <h2>New post</h2>
                  <div class="em-bar-main">
                     <div class="em-bar em-bar-big"></div>
                  </div>
                  <p>We are the makers of Future Leaders!</p>
               </div>
            </div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="new_post_filter_btn text-center">
						<ul>
							<li><a href="#0" class="btn default" data-filter>all</a></li>
                     @foreach($blogcates as $blogcate)
							<li><a href="#0" class="btn default" data-filter="home">{{ $blogcate->name }}</a></li>
                     @endforeach

						</ul>
					</div>
				</div>
			</div>
            <div class="row">
               @foreach($tabblogs as $blog)
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="trendy_post_box" data-tags="home">
                     <a href="{{ route('single.blog',$blog->slug) }}">
                        <div class="tp_img">
                           <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="">
                        </div>
                        <div class="blog_info">
                           <div class="titel new_post_titel">
                              <h3>{{ Str::words($blog->title,6,'...') }}</h3>
                           </div>
                           <div class="author_info">
                              <div class="author_img">
                                  @if($blog->user->userdetail)
                                    @if($blog->user->userdetail->image)
                                    <img src="{{asset('storage/app/public/'.$blog->user->userdetail->image)}}" alt="" style="height:56px; width: 56px; border-radius: 15px;">
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                              </div>
                              <div class="author_details">
                                 <h6>{{ Str::words($blog->user->name,3,'...')  }}</h6>
                                 @if($blog->user->userdetail) <span>{{ Str::words($blog->user->userdetail->profession ,'3','..') }}</span> @endif
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- End New Post Area -->

      <!-- Start All Post Area -->
      <section class="blog_page_ctn">
         <div class="container">
            <div class="row">
               <div class="review-title text-center">
                  <h2>All post</h2>
                  <div class="em-bar-main">
                     <div class="em-bar em-bar-big"></div>
                  </div>
                  <p>We are the makers of Future Leaders!</p>
               </div>
            </div>
            <div class="row">
               @foreach($blogs as $blog)
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="blog_top_post_right blog_box all_post_box">
                     <div class="row">

                        <div class="col-md-5">

                           <div class="blog_img">
                           <a href="{{ route('single.blog',$blog->slug) }}">
                              <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="{{ $blog->title }}">
                           </a>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="blog_info">
                              <div class="titel">
                              <a href="{{ route('single.blog',$blog->slug) }}">
                                 <h3>{{ Str::words($blog->title,10,'..') }}</h3>
                              </a>
                              </div>
                              <div class="detail_info">
                                 <ul>
                                    <li>
                                       <img src="{{ asset('public/frontend/assets/images/Vector(1).png') }}" alt="">
                                          @foreach($blog->blogcate as $blogcate)
                                             <a href="#">{{ $blogcate->name }}</a> 
                                          @endforeach
                                    </li>
                                    <li>
                                       <img src="{{ asset('public/frontend/assets/images/Vector.png') }}" alt="">
                                       <a href="#">{{ $blog->created_at->format('d F,Y') }}</a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="author_info">
                                 <div class="author_img">
                                    @if($blog->user->userdetail)
                                    @if($blog->user->userdetail->image)
                                    <img src="{{asset('storage/app/public/'.$blog->user->userdetail->image)}}" alt="" style="height:56px; width: 56px; border-radius: 15px;">
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                                    @else
                                    <img src="{{asset('public/frontend/assets/images/Rectangle 1764.png')}}" alt="">
                                    @endif
                                 </div>
                                 <div class="author_details">
                                    <h6>{{ $blog->user->name }}</h6>
                                    @if($blog->user->userdetail)
                                    <span>{{ Str::words($blog->user->userdetail->profession ,'3','..') }}</span>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="row text-align-center">
               <a href="{{ route('latest.blogs') }}" class="btn default" >All Blogs</a>

               {{-- {{ $blogs->links('pagination::bootstrap-4') }} --}}
            </div>
         </div>
      </section>
      <!-- End All Post Area -->
      <!-- Start Top Author Area -->
      <section class="top_author_area">
         <div class="container">
            <div class="row">
               <div class="review-title text-center">
                  <h2>Top Author</h2>
                  <div class="em-bar-main">
                     <div class="em-bar em-bar-big"></div>
                  </div>
                  <p>We are the makers of Future Leaders!</p>
               </div>
            </div>
            <div class="top_author_slider owl-carousel" id="top_author_slider">
               @foreach($users as $user)
               @php
               $a = count($user->blog);

               @endphp
               <div class="item">
                  <div class="top_author">
                     <div class="author_img">
                        @if($user->userdetail)
                           @if($user->userdetail->image)
                              <img src="{{ asset('storage/app/public/'.$user->userdetail->image) }}" alt="{{ $user->name }}" style="height:280px !important;">
                           @else
                              <img src="{{asset('public/frontend/assets/images/Frame 25.png')}}" alt="{{ $user->name }}" style="height:280px !important;">
                           @endif
                        @else
                        <img src="{{asset('public/frontend/assets/images/Frame 25.png')}}" alt="{{ $user->name }}" style="height:280px !important;">
                        @endif
                     </div>
                     <div class="author_detail text-center">
                        <h5>{{ $user->name }}</h5>
                        <span>@if($user->userdetail){{ $user->userdetail->profession }}@endif</span>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- End Top Author Area -->
      <!-- Start Subscribe Area -->
         <section class="subscribe_area">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                     <div class="subscribe_box text-center">
                        <h3>Welcome to our newsletter</h3>
						<span>Get blog post everyday </span>
						<input type="email" class="form-control">
						<a href="#" class="btn default sub_btn">Subscribe now</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      <!-- End Subscribe Area -->
@endsection