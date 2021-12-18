@extends('layouts.app')

@section('title',$blog->title)

@section('content')


    <section class="job-banner-wrapper">
        <div class="job-wrap">
           <div class="container">
              <div class="row align-items-center">
                 <div class="col-lg-12 mx-auto">
                    <div class="title text-center">
                        <h1 style="font-size:46px;">{{ $blog->title }}</h1>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
    <section class="single-blog-wrapper-area">
        <div class="single-blog-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="single_blog_top_ctn">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <i class="far fa-user"></i>
                                        <a href="#0">{{ $blog->user->name ?? "" }}</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-box-open"></i>
                                        <a href="#0">@foreach($blog->blogcate as $blogcate) {{ $blogcate->name }} @endforeach</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-calendar-plus"></i>
                                        <a href="#0">{{ $blog->created_at->format('d/m/Y') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-share">
                                <ul class="social">
                                    <li><span>Share:</span>
                                    </li>
                                    <li><a class="facebook" href="#0"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a class="twitter" href="#0"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a class="linkedin" href="#0"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li><a class="instagram" href="#0"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="article-content">
                            <p>{!! $blog->description !!}</p>
                            <div class="article-footer">
                                <div class="article-tags">
                                    <span><i class="fas fa-tag"></i></span>
                                    @foreach($blog->blogcate as $blogcate)
                                    <a href="#0">{{ $blogcate->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="blog-wrapper-area single_relted_post">
                                <div class="blog-wrap">
                                <div class="container">
                                    <h3 class="related_titel">Related Posts </h3>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="blog-box">
                                            <div class="blog-image">
                                                <img src="assets/images/blog-1.jpg" alt="" class="img-fluid">
                                            </div>
                                            <div class="blog-text">
                                                <div class="bc-header">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p> <i class="far fa-clock"></i> <span>15</span> nov 2020</p>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p class="bch-comments"><i class="far fa-comment"></i>3 comments</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bc-text">
                                                    <h3><a href="blog.html">6 Ways To Make Internal Decessions</a>
                                                    </h3>
                                                </div>
                                                <div class="bc-btn">
                                                    <a href="#0">Read More +</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="blog-box">
                                            <div class="blog-image">
                                                <img src="assets/images/blog-2.jpg" alt="" class="img-fluid">
                                            </div>
                                            <div class="blog-text">
                                                <div class="bc-header">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p> <i class="far fa-clock"></i> <span>15</span> nov 2020</p>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p class="bch-comments"><i class="far fa-comment"></i>3 comments</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bc-text">
                                                    <h3><a href="blog.html">The Challenges to Tackle Before You Start With AI</a>
                                                    </h3>
                                                </div>
                                                <div class="bc-btn">
                                                    <a href="#0">Read More +</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="comments-area">
                                <h3 class="comments-title">2 Comments:</h3>
                                <ol class="comment-list">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/images/author.jpg" class="avatar" alt="uu"><b class="fn">John Jones</b><span class="says">says:</span>
                                                </div>
                                                <div class="comment-metadata"><span>April 24, 2019 at 10:59 am</span>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                            </div>
                                            <div class="reply"><a class="comment-reply-link" href="/blog-details/#">Reply</a>
                                            </div>
                                        </div>
                                        <ol class="children">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="assets/images/author.jpg" class="avatar" alt="uu"><b class="fn">Steven Smith</b><span class="says">says:</span>
                                                        </div>
                                                        <div class="comment-metadata"><span>April 24, 2019 at 10:59 am</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                                    </div>
                                                    <div class="reply"><a href="#" class="comment-reply-link">Reply</a>
                                                    </div>
                                                </div>
                                                <ol class="children">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <img src="assets/images/author.jpg" class="avatar" alt="uu"><b class="fn">Sarah Taylor</b><span class="says">says:</span>
                                                                </div>
                                                                <div class="comment-metadata"><span>April 24, 2019 at 10:59 am</span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content">
                                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                                            </div>
                                                            <div class="reply"><a class="comment-reply-link" href="/blog-details/#">Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Leave a comment</h3>
                                    <form class="comment-form">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>Required fields are marked<span class="required">*</span>
                                        </p>
                                        <p class="comment-form-comment">
                                            <label>Comment</label>
                                            <textarea name="comment" id="comment" cols="45" placeholder="Your Comment..." rows="10" required=""></textarea>
                                        </p>
                                        <p class="comment-form-author">
                                            <label>Name <span class="required">*</span>
                                            </label>
                                            <input type="text" id="author" placeholder="Your Name*" name="author" required="">
                                        </p>
                                        <p class="comment-form-email">
                                            <label>Email <span class="required">*</span>
                                            </label>
                                            <input type="email" id="email" placeholder="Your Email*" name="email" required="">
                                        </p>
                                        <p class="comment-form-url">
                                            <label>Website</label>
                                            <input type="url" id="url" placeholder="Website" name="url">
                                        </p>
                                        <p class="comment-form-cookies-consent">
                                            <input type="checkbox" value="yes" name="comment-cookies-consent" id="comment-cookies-consent">
                                            <label>Save my name, email, and website in this browser for the next time I comment.</label>
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.blog_sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection