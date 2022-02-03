@php
  // App\Models\Admin\Blog::latest(5);
  // $setting = App\Models\Admin\Setting::first();
  $blogcates = App\Models\Admin\Blogcate::latest()->get();
  // $tags = App\Models\Admin\Tag::where('status',1)->get();

  $recentblogs = App\Models\Admin\Blog::where('status',1)->latest()->limit('3')->get();
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
            <form class="search-form" action="{{ route('search') }}" method="post">
                @csrf
                <label><span class="screen-reader-text">Search for:</span>
                    <input type="search" name="search" class="search-field" placeholder="Search...">
                </label>
                <button type="submit"><i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="widget">
        <h3 class="widget-title">Recent news</h3>
        <div class="recent_news widget_recent_news">
            @foreach($recentblogs as $blog)
            <div class="single_news">
                <div class="news_img">
                    <a href="{{ route('single.blog',$blog->slug) }}"><img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="{{ $blog->title }}"></a>
                </div>
                <h5> <a href="{{ route('single.blog',$blog->slug) }}">{{ Str::words($blog->title,'6','..') }}</a></h5>
                <div class="date">{{ $blog->created_at->format('d F,Y') }}</div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($blogcates as $blogcate)
            <li><a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }} <span class="post-count">({{ $blogcate->blog->count() }})</span></a>
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
                    <li><a href="{{ route('archieve.month',$dt->format("F-Y")) }}">{{ $dt->format("F-Y") }}<span class="post-count">({{ $archcount }})</span></a>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="widget widget_tag_cloud">
        <h3 class="widget-title">Popular Tags</h3>
      
        <div class="tagcloud"> @foreach($randomcates as $blogcate) <a href="{{ route('category.blogs',$blogcate->slug) }}">{{ $blogcate->name }} <span class="tag-link-count">({{ $blogcate->blog->count() }})</span></a>@endforeach
        </div>
    </div>
</div>