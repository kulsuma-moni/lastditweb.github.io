@extends('layouts.app')

@section('title',$blog->title)
@section('header')

@endsection

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
                                    <li>
                                        <i class="far fa-eye"></i>
                                        <a href="#0">{{ $blog->views }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-share">
                                <ul class="social">
                                    <li><span>Share:</span>
                                    </li>
                                    <li><a class="facebook" href="{{ $blog->fb() }}"  target="popup"
                                            onclick="window.open('{{ $blog->fb() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a class="twitter"  href="{{ $blog->twitter() }}"  target="popup"
                                            onclick="window.open('{{ $blog->twitter() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a class="linkedin"  href="{{ $blog->linkedin() }}"  target="popup"
                                            onclick="window.open('{{ $blog->linkedin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li><a class="instagram"  href="{{ $blog->pin() }}"  target="popup"
                                            onclick="window.open('{{ $blog->pin() }}','popup','width=600,height=600'); return false;" rel="nofollow"><i class="fab fa-pinterest"></i></a>
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
                                        @foreach($relatedproduct as $related)
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="blog-box">
                                            <div class="blog-image">
                                                <a href="{{ route('single.blog',$blog->slug) }}"></a>
                                                <img src="{{ asset('storage/app/public/'.$related->image) }}" alt="{{ $related->title }}" class="img-fluid">
                                            </div>
                                            <div class="blog-text">
                                                <div class="bc-header">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p> <i class="far fa-clock"></i> <span> {{ $related->created_at->format('d') }} </span> {{ $related->created_at->format('M,Y') }} </p>
                                                        </div>
                                                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-6">
                                                        <p class="bch-comments"><i class="far fa-comment"></i>3 comments</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bc-text">
                                                    <h3><a href="{{ route('single.blog',$related->slug) }}">{{ Str::words($related->title,'7','...') }}</a>
                                                    </h3>
                                                </div>
                                                <div class="bc-btn">
                                                    <a href="{{ route('single.blog',$related->slug) }}">Read More +</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="comments-area">
                                <h3 class="comments-title">Comments {{ $blog->blogcomment->count() }}:</h3>
                                <div class="comment-respond">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong>{{session('success')}}.
                                        </div>
                                    @endif
                                    @if(session('wrong'))
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong> {{session('wrong')}}.
                                        </div>
                                    @endif
                                    <h3 class="comment-reply-title">Leave a comment</h3>
                                    @guest  
                                    <form action="{{ route('blog.comment') }}" method="post" class="comment-form">
                                        @csrf
                                        <p class="comment-notes"><span id="email-notes">Comment must be 4 - 300 character</span><span class="required">*</span>
                                        </p>
                                        <input type="hidden" name="user_id" value="">
                                        <input type="hidden" name="blog_id" value="">
                                        <p class="comment-form-comment">
                                            <label>Comment</label>
                                            <textarea name="comment" id="comment" cols="45" placeholder="Your Comment..." rows="10" required=""></textarea>
                                        </p>
                                        <p class="comment-form-cookies-consent">
                                            {{-- <input type="checkbox" value="yes" name="comment-cookies-consent" id="comment-cookies-consent"> --}}
                                            {{-- <label>Save my name, email, and website in this browser for the next time I comment.</label> --}}
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
                                        </p>
                                    </form>

                                    @else  
                                    <form action="{{ route('blog.comment') }}" method="post" class="comment-form">
                                        @csrf
                                        <p class="comment-notes"><span id="email-notes">Comment must be 4 - 300 character</span><span class="required">*</span>
                                        </p>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <p class="comment-form-comment">
                                            <label>Comment</label>
                                            <textarea name="comment" id="comment" cols="45" placeholder="Your Comment..." rows="10" required=""></textarea>
                                        </p>
                                        <p class="comment-form-cookies-consent">
                                            {{-- <input type="checkbox" value="yes" name="comment-cookies-consent" id="comment-cookies-consent"> --}}
                                            {{-- <label>Save my name, email, and website in this browser for the next time I comment.</label> --}}
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
                                        </p>
                                    </form>

                                    @endguest
                                </div>
                                <ol class="comment-list">
                                    @foreach($blogcomments as $blogcomment)
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
                                                    @if($blogcomment->user->userdetail->image)
                                                    <img src="{{ asset('storage/app/public/'.$blogcomment->user->userdetail->image) }}" class="avatar" alt="{{ $blogcomment->user->name }}">

                                                    @else
                                                    <img src="{{ asset('public/frontend/assets/images/author.jpg') }}" class="avatar" alt="{{ $blogcomment->user->name }}">

                                                    @endif
                                                    <b class="fn">{{ $blogcomment->user->name }}</b><span class="says">says:</span>
                                                </div>
                                                <div class="comment-metadata"><span>{{ $blogcomment->created_at->format('F d, Y') }} at {{ $blogcomment->created_at->format('h:i') }}</span>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>{{ $blogcomment->comment }}</p>
                                            </div>
                                            <div class="reply">
                                                @guest

                                                @else
                                                @if($blogcomment->user_id == Auth::user()->id)
                                                <a class="comment-reply-link" href="{{ route('blog.comment.delete',$blogcomment->id) }}">Delete</a>
                                                @endif
                                                <a class="comment-reply-link" href="/blog-details/#">Reply</a>

                                                @endguest
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    @include('layouts.blog_sidebar')
                </div>
            </div>
        </div>
    </section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
@endsection