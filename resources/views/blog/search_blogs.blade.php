@extends('layouts.app')

@section('title','Delwarit | Latest Blogs')

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
<!-- Start All Post Area -->
<section class="blog_page_ctn">
 <div class="container">
    <div class="row">
       <div class="review-title">
         @if($blogs->count() > 0)
          <blockquote>Search Result!!for <strong>{{ $search }}</strong> , total result : <strong>{{ $blogs->count() }}</strong></blockquote>
          @else

          <blockquote>Search Result!! <strong>No data fount..</strong></blockquote>
          @endif
             <div class="em-bar em-bar-big"></div>
       </div>
    </div>
    <div class="row">

    @if($blogs->count() > 0)
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
    @endif
    </div>
    <div class="row mb-4">

       <center><p>{{ $blogs->links('pagination::bootstrap-4') }}</p></center>
    </div>
 </div>
</section>
<!-- End All Post Area -->

@endsection