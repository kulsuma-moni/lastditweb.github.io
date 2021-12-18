<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use Image;
use Str;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $courses = Course::latest()->get();
        $count = 1;
        return view('admin.course.index_course',compact('courses','count'));
    }
    public function create()
    {
        $courses = Course::latest()->get();
        $count = 1;
        return view('admin.course.create_course',compact('courses','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:courses',
            'description'=>'required',
            'career'=>'',
            'total_class'=>'required|max:255',
            'duration'=>'required|max:255',
            'course_fee'=>'required|max:255',
            'discount'=>'',
            'meta_tag'=>'',
            'image'=>'required|file|max:300',

        ]);

        $course = Course::create($data);
        $this->storeImage($course);

        return redirect()->back()->with('success', 'Successfully');
        // if($course){
        //     $notification = array(
        //         'messege' =>'blog added successfull',
        //         'alert-type' =>'success'
        //     );
        //     return redirect()->back()->with($notification);
        // }else{
        //     $notification = array(
        //         'messege' =>'Ups!!something went wrong!',
        //         'alert-type' =>'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }

    }


    public function edit(Course $course)
    {
        return view('admin.course.edit_course',compact('course'));
    }


    public function update(Course $course ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $course->update([
                'image' => $request->image->store('admin/course','public'),
            ]);
            // $resize = Image::make('storage/'.$course->image)->resize(250,300);
            // $resize->save();
        }

        $data = $request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'description'=>'required',
            'career'=>'',
            'total_class'=>'required|max:255',
            'duration'=>'required|max:255',
            'course_fee'=>'required|max:255',
            'discount'=>'',
            'meta_tag'=>'',
        ]);

        $course->update($data);

        return redirect()->back()->with('editsuccess', 'Successfully');
    }

    
    public function delete(Course $course)
    {
        if($course->image){
        unlink('storage/app/public/'.$course->image);
        }
      
        $course->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(Course $course)
    {
        $course->update(['status' => 1]);
        if($course){
            $notification = array(
                'messege' =>'course activate successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    
    public function deactive(Course $course)
    {
        $course->update(['status' => 0]);
        if($course){
            $notification = array(
                'messege' =>'course deactivate successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    //private methods
    // private function validateRequest()
    // {
    //     return 
    // }

    private function storeImage($course)
    {
        if(request()->hasFile('image')){
            $course->update([
                'image' => request()->image->store('admin/course','public'),
            ]);
        // $resize = Image::make('storage/'.$course->image)->resize(250,300);
        // $resize->save();
        }
    }

}
