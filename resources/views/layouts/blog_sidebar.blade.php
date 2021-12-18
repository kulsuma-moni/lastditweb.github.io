@php
  // App\Models\Admin\Blog::latest(5);
  // $setting = App\Models\Admin\Setting::first();
  $blogcates = App\Models\Admin\Blogcate::latest()->get();
  // $tags = App\Models\Admin\Tag::where('status',1)->get();

  // $blogs = App\Models\Admin\Blog::latest()->get();
  // $latestblogs = App\Models\Admin\Blog::latest()->limit(5)->get();
  // $randomblogs = App\Models\Admin\Blog::inRandomOrder()->limit(5)->get();
  $randomcates = App\Models\Admin\Blogcate::inRandomOrder()->limit(12)->get();

  $result = Carbon\CarbonPeriod::create('2012-01', '1 month', date('Y-m'));

  // $archieveblogs = App\Models\Admin\Blog::where('date')->get();
  @endphp
<div class="col-lg-4 col-md-12">
    <div class="widget-area">
        <div class="widget widget_search">
            <h3 class="widget-title">Search</h3>
            <form class="search-form">
                <label><span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search...">
                </label>
                <button type="submit"><i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Recent news</h3>
        <div class="recent_news widget_recent_news">
            <div class="single_news">
                <div class="news_img">
                    <a href="#"><img src="assets/images/blog1.png" alt="image"></a>
                </div>
                <h5> <a href="#">The lengthy show-and-tell style post featured a long</a></h5>
                <div class="date">22 May, 2020</div>
            </div>
            <div class="single_news">
                <div class="news_img">
                    <a href="#"><img src="assets/images/blog2.png" alt="image"></a>
                </div>
                <h5> <a href="#">The lengthy show-and-tell style post featured a long</a> </h5>
                <div class="date">20 May, 2020</div>
            </div>
            <div class="single_news">
                <div class="news_img">
                    <a href="#"><img src="assets/images/blog3.png" alt="image"></a>
                </div>
                <h5> <a href="">The lengthy show-and-tell style post featured a long</a> </h5>
                <div class="date">20 july, 2020</div>
            </div>
        </div>
    </div>
    <div class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($blogcates as $blogcate)
            <li><a href="">{{ $blogcate->name }} <span class="post-count">(03)</span></a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget_categories">
        <h3 class="widget-title">Archieve</h3>
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
    <div class="widget widget_tag_cloud">
        <h3 class="widget-title">Popular Tags</h3>
      
        <div class="tagcloud"> @foreach($randomcates as $blogcate) <a href="/blog-details/#">{{ $blogcate->name }} <span class="tag-link-count">(3)</span></a>@endforeach
        </div>
    </div>
</div>