<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Image;
use Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = Brand::latest()->get();
        $count = 1;
        return view('admin.brand.brand',compact('brands','count'));
    }
    public function create()
    {

        $brands = Brand::latest()->get();
        $count = 1;
        return view('admin.product.brand.create_brand',compact('brands','count'));
    }


    public function store(Request $request)
    {
        $this->validateRequest();
        $brand = Brand::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name).'-'.time(),
            'image'=>$request->image,
        ]);
        $this->storeImage($brand);
        if($brand){
            $notification = array(
                'messege' =>'Brand added successfull',
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


    public function update(Brand $brand ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/'.$request->old_image);
            }
            $brand->update([
                    'image' => $request->image->store('admin/brand','public'),
            ]);
            $resize = Image::make('storage/'.$brand->image)->resize(250,300);
            $resize->save();
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name).'-'.time(),
        ]);

        if($brand){
            $notification = array(
                'messege' =>'Brand updated successfull',
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

    
    public function delete(Brand $brand)
    {
        if($brand->image){
        unlink('storage/'.$brand->image);
        }
        if($brand->image2){
        unlink('storage/'.$brand->image2);
        }
      
        $brand->delete();
        if($brand){
            $notification = array(
                'messege' =>'Brand deleted successfull',
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

    
    public function active(Brand $brand)
    {
        $brand->update(['status' => 1]);
        if($brand){
            $notification = array(
                'messege' =>'brand activate successfull',
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

    
    public function deactive(Brand $brand)
    {
        $brand->update(['status' => 0]);
        if($brand){
            $notification = array(
                'messege' =>'brand deactivate successfull',
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
    private function validateRequest()
    {
        return request()->validate([
            'name'=>'required',
            'image'=>'required|file|image|max:2048',
        ]);
    }

    private function storeImage($brand)
    {
        if(request()->hasFile('image')){
            $brand->update([
                'image' => request()->image->store('admin/brand','public'),
            ]);
        $resize = Image::make('storage/'.$brand->image)->resize(250,300);
        $resize->save();
        }
    }
}
