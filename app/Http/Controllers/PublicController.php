<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Blogcate;
use App\Models\Admin\Blog;
use App\Models\Admin\Slider;
use App\Models\Admin\Course;
use App\Models\Admin\Portfoliocate;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Service;
use App\Models\Admin\Careerapply;
use App\Models\User\Freelancer;
use App\Models\User\Entrepreneur;
use App\Models\Admin\Career;
use App\Models\Contact;
use App\Models\User;
use Carbon\CarbonPeriod;
use Image;
use Str;



class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $courses = Course::where('status',1)->limit(6)->get();
        $blogs = Blog::where('status',1)->limit(3)->get();
        $portfoliocates = Portfoliocate::where('status',1)->latest()->get();
        return view('home',compact('categories','courses','blogs','portfoliocates'));
    }

    public function admissionForm()
    {
        $courses = Course::latest()->get();
        return view('admission_form',compact('courses'));
    }

    public function courses()
    {
        $courses = Course::where('status',1)->get();
        $lastcourse = Course::orderBy('created_at','desc')->first();
        return view('courses',compact('courses','lastcourse'));
    }

    public function courseSingle($slug)
    {
        $course = Course::where('slug',$slug)->first();
        $courses = Course::where('status',1)->get();
        return view('course.single_course',compact('courses','course'));
    }


    public function freelancers()
    {
        $freelancers = Freelancer::latest()->get();
        return view('freelancer.freelancers',compact('freelancers'));
    }

    public function freelancerSingle($slug)
    {
        $freelancer = Freelancer::where('slug',$slug)->first();
        return view('freelancer.single_freelancer',compact('freelancer'));
    }


    public function careers()
    {
        $careers = career::latest()->get();
        return view('career.careers',compact('careers'));
    }

    public function careerSingle($slug)
    {
        $career = career::where('slug',$slug)->first();
        return view('career.single_career',compact('career'));
    }

    public function careerApply(Career $career)
    {
        return view('career.apply_job',compact('career'));
    }
    public function careerApplication()
    {

        $data = request()->validate([

            'career_id' =>'required|max:11',
            'user_id' =>'required|max:11',
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'expect_salary'=>'max:191',
            'phone'=>'max:191',
            'image'=>'dimensions:min_width=295,max_width=305,min_height=295,max_height=305',
            'file'=>'',

        ]);



        $career = careerapply::create($data);

        if(request()->hasFile('image')){
            $career->update([
                'image' => request()->image->store('admin/career','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$career->image)->resize(300,300);
        $resize->save();
        }

        if(request()->hasFile('file')){
            $career->update([
                'file' => request()->file->store('admin/career','public'),
            ]);
        }

        if($career){
            return redirect()->back()->with('success', 'Successfull');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    public function entrepreneurs()
    {
        $entrepreneurs = entrepreneur::latest()->get();
        return view('entrepreneur.entrepreneurs',compact('entrepreneurs'));
    }

    public function entrepreneurSingle($slug)
    {
        $entrepreneur = entrepreneur::where('slug',$slug)->first();
        return view('entrepreneur.single_entrepreneur',compact('entrepreneur'));
    }

    public function portfolios()
    {
        $portfolios = Portfolio::where('status',1)->get();
        $portfoliocates = Portfoliocate::where('status',1)->get();
        return view('portfolios',compact('portfoliocates','portfolios'));
    }

    public function services()
    {
        $services = Service::where('status',1)->get();
        $lastservice = Service::orderBy('created_at','desc')->first();
        return view('services',compact('services','lastservice'));
    }

    public function serviceSingle($slug)
    {
        $service = Service::where('slug',$slug)->first();
        $services = Service::where('status',1)->get();
        return view('service.single_service',compact('services','service'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status',1)->latest()->paginate(8);
        $trends = Blog::where('trend',1)->where('status',1)->latest()->limit(3)->get();
        $importents = Blog::where('importent',1)->where('status',1)->latest()->limit(2)->get();
        $tabblogs = Blog::where('status',1)->latest()->limit(16)->get();
        $pupularblogs = Blog::where('status',1)->latest()->limit(3)->get();
        $blogcates = Blogcate::latest()->get();
        $lastblog = Blog::where('status',1)->latest()->first();
        $users = User::where('is_editor',1)->orWhere('is_admin',1)->get();
        // $authors = $users->blog();
        $result = CarbonPeriod::create('2012-01', '1 month', date('Y-m'));
        return view('blog.blogs',compact('blogs','trends','importents','tabblogs','lastblog','pupularblogs','blogcates','result','users'));
    }
    public function latestBlogs()
    {
        $blogs = Blog::where('status',1)->paginate(28);
        return view('blog.latest_blogs',compact('blogs'));
    }   

    public function archieveMonth($archieve)
    {
        $blogs = Blog::where('month',$archieve)->paginate(28);
        return view('blog.achieve_blogs',compact('blogs','archieve'));
    }

    public function categoryBlogs($blogcate)
    {
        $blogcate = Blogcate::where('slug',$blogcate)->first();
        $blogs = $blogcate->blog()->paginate(28);
        return view('blog.category_blogs',compact('blogs','blogcate'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        $blog->update([
           'views' => $blog->views + 1,
       ]);

        $blogcomments = $blog->blogcomment;

        $relatedproduct = Blog::where('status',1)->inRandomOrder()->latest()->limit(2)->get();
        return view('blog.single_blog',compact('blog','relatedproduct','blogcomments'));
    }

    public function team()
    {
        return view('team');
    }

    public function about()
    {
        return view('about');
    }

    public function ceo()
    {
        return view('ceo');
    }

    public function addmissionProcedure()
    {
        return view('admission_procedure');
    }


    public function contact()
    {
        return view('contact');
    }

    public function createContact(Request $request)
    {

        $data = $request->validate([

            'name'=>'required|max:191',
            'phone'=>'',
            'subject'=>'',
            'email'=>'required|max:191',
            'message'=>'required',
            'devide'=>'',

        ]);

        $contact = Contact::create($data);
        if($contact){
            return redirect()->back()->with('success', 'Message send successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');

        }

    }














    public function shop()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('shop',compact('categories','brands','products'));
    }


    // public function singleProduct($slug)
    // {
    //     $product = Product::where('slug',$slug)->first();
    //     return view('single_product',compact('product'));
    // }

    // public function brandProduct($slug)
    // {
    //     $brand = Brand::where('slug',$slug)->first();
    //     $products = $brand->product;
    //     return view('brand_product',compact('brand','products'));
    // }

    // public function categoryProduct($slug)
    // {
    //     $category = Category::where('slug',$slug)->first();
    //     $products = $category->product;
    //     return view('category_product',compact('category','products'));
    // }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::where('title','LIKE', "%$search%")->orwhere('description','LIKE', "%$search%")->latest()->paginate(30);
        $blogcates = array();
            if (count($blogs) == 0) {
                $blogcates = Blogcate::where('name','LIKE',"%$search%")->latest()->paginate(12);
            }
        return view('blog.search_blogs',compact('blogs','search','blogcates'));
    }

}
