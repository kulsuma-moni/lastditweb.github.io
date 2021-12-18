<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Image;
use Str;
use Auth;


class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sliders =  slider::where('status',1)->get();
        return view('admin.slider.index_slider',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create_slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:25',
            'description'=>'required|max:90',
        ]);

        $slider = slider::create([

            'title'=>$request->title,
            'image'=>$request->image,
            'description'=>$request->description,

        ]);
        $this->storeImage($slider);
        if($slider){
            $notification = array(
                'messege' =>'slider added successfull',
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

    //slider EDIT
    public function edit(slider $slider,Request $request)
    {

        return view('admin.slider.edit_slider',compact('slider'));
    }


    //slider UPDATE

    public function update(slider $slider,Request $request)
    {
        $request->validate([
            'title'=>'required|max:25',
            'description'=>'required|max:90',
        ]);


         if($request->has('image')){
             if($request->old_image){
                 unlink('storage/'.$request->old_image);
             }
             $slider->update([
                 'image' => $request->image->store('admin/slider','public'),
             ]);
             $resize = Image::make('storage/'.$slider->image)->resize(1340,400);
          
             $resize->save();
         }



        $slider->update([

            'title'=>$request->title,            
            // 'user_id'=> Auth::id(),
            // 'image'=>$request->image,
            'description'=>$request->description,

        ]);
        // $this->storeImage($slider);
        if($slider){
            $notification = array(
                'messege' =>'slider updated successfull',
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

    public function delete(slider $slider)
    {
        if($slider->image){
        unlink('storage/'.$slider->image);
        }
      
        $slider->delete();
        if($slider){
            $notification = array(
                'messege' =>'slider Deleted successfull',
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

    
    public function active(slider $slider)
    {
        $slider->update(['status' => 1]);
        if($slider){
            $notification = array(
                'messege' =>'slider activate successfull',
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

    
    public function deactive(slider $slider)
    {
        $slider->update(['status' => 0]);
        if($slider){
            $notification = array(
                'messege' =>'slider deactivate successfull',
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

    public function deactiveList()
    {
        $sliders =slider::where('status',0)->get();
        return view('admin.slider.deactive_slider',compact('sliders'));
    }

    public function activeList()
    {
        $sliders =slider::where('status',1)->get();
        return view('admin.slider.slider_deactive',compact('sliders'));
    }




    //PUBLIC FUNCTIONS
    // private function validateRequest()
    // {
        
    //     return request()->validate([
    //         'title'=>'required',
    //         'slug'=> 'required',
    //         'slidercate_id'=>'required',
    //         'quantity'=>'required',
           
    //         'price'=>'required',
    //         'description'=>'required',
            
    //     ]);
    // }


    private function storeImage($slider)
    {
        if(request()->hasFile('image')){
            $slider->update([
                'image' => request()->image->store('admin/slider','public'),
            ]);
            $resize = Image::make('storage/'.$slider->image)->resize(1340,400);
            $resize->save();
        }
    }
}
