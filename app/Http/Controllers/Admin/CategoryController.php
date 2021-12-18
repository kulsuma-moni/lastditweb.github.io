<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Image;
use Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::latest()->get();
        $count = 1;
        return view('admin.category.category',compact('categories','count'));
	}
    public function create()
    {

        $categories = Category::latest()->get();
        $count = 1;
        return view('admin.product.category.create_category',compact('categories','count'));
	}


    public function store(Request $request)
    {
		$this->validateRequest();
    	$category = Category::create([
			'name'=>$request->name,
			'slug'=>Str::slug($request->name).'-'.time(),
			'image'=>$request->image,
		]);
      	$this->storeImage($category);
	    return redirect()->back()->with('addsuccess', 'Successfully');
    }


    public function update(Category $category ,Request $request)
    {
		if($request->has('image')){
			if($request->old_image){
					unlink('storage/'.$request->old_image);
			}
			$category->update([
					'image' => $request->image->store('admin/category','public'),
			]);
			$resize = Image::make('storage/'.$category->image)->resize(250,300);
			$resize->save();
		}

		$category->update([
			'name' => $request->name,
			'slug' => Str::slug($request->name).'-'.time(),
		]);

    	return redirect()->back()->with('editsuccess', 'Successfully');
    }

    
    public function delete(Category $category)
    {
        if($category->image){
        unlink('storage/'.$category->image);
        }
        if($category->image2){
        unlink('storage/'.$category->image2);
        }
      
        $category->delete();
        if($category){
            $notification = array(
                'messege' =>'category Deleted successfull',
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

    
    public function active(Category $category)
    {
        $category->update(['status' => 1]);
        if($category){
            $notification = array(
                'messege' =>'category activate successfull',
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

    
    public function deactive(Category $category)
    {
        $category->update(['status' => 0]);
        if($category){
            $notification = array(
                'messege' =>'category deactivate successfull',
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

    private function storeImage($category)
    {
    	if(request()->hasFile('image')){
    		$category->update([
    			'image' => request()->image->store('admin/category','public'),
    		]);
        $resize = Image::make('storage/'.$category->image)->resize(250,300);
        $resize->save();
    	}
	}
}
