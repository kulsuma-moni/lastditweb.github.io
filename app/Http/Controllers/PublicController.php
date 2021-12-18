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
use App\Models\Contact;
use Carbon\CarbonPeriod;


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
        $blogs = Blog::where('status',1)->get();
        $pupularblogs = Blog::where('status',1)->inRandomOrder()->limit(3)->get();
        $blogcates = Blogcate::latest()->get();
        $result = CarbonPeriod::create('2012-01', '1 month', date('Y-m'));
        return view('blog.blogs',compact('blogs','pupularblogs','blogcates','result'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('blog.single_blog',compact('blog'));
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


    public function singleProduct($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('single_product',compact('product'));
    }

    public function brandProduct($slug)
    {
        $brand = Brand::where('slug',$slug)->first();
        $products = $brand->product;
        return view('brand_product',compact('brand','products'));
    }

    public function categoryProduct($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = $category->product;
        return view('category_product',compact('category','products'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name','LIKE', "%$search%")->orwhere('description','LIKE', "%$search%")->latest()->get();
        $categories = array();
        $brands = array();
            if (count($products) == 0) {
                $categories = Blogcate::where('name','LIKE',"%$search%")->latest()->paginate(12);
                if (count($categories) == 0) {
                    $brands = Tag::where('name','LIKE',"%$search%")->latest()->paginate(12);
                }
            }
        return view('search',compact('products','search','categories','brands'));
    }

}
