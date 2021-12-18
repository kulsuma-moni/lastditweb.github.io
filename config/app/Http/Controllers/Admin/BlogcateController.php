<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blogcate;
use Image;
use Str;

class BlogcateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogcates = Blogcate::latest()->get();
        $count = 1;
        return view('admin.blog.blog_category',compact('blogcates','count'));
    }

    public function create(Request $request)
    {
        $this->validateRequest();
        $blogcate = Blogcate::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name).'-'.time(),
            'image'=> $request->image,
        ]);
        $this->storeImage($blogcate);
        return redirect()->back()->with('success','blogcate Stored Successfully.');
    }

    public function update(Blogcate $blogcate ,Request $request)
    {
        $request->validate([
                'name'=>'required',
                'image'=>'',
        ]);
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/app/public/'.$request->old_image);
            }
            $blogcate->update([
                    'image' => $request->image->store('admin/blogcate','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$blogcate->image)->resize(300,300);
            $resize->save();
        }
        $blogcate->update([
                'name' => $request->name,
                'slug'=>Str::slug($request->name).'-'.time(),
        ]);

        return redirect()->back()->with('success','blogcate Updated Successfully');

    }

    public function delete(Blogcate $blogcate)
    {
        if($blogcate->image){
        unlink('storage/app/public/'.$blogcate->image);
        }
        $blogcate->delete();
          return redirect()->back()->with('deletesuccess','Deleted Successful');
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'name'=>'required',
            // 'image'=>'required',
        ]);
    }

    private function storeImage($blogcate)
    {
        if(request()->hasFile('image')){
            $blogcate->update([
                'image' => request()->image->store('admin/blogcate','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$blogcate->image)->resize(300,300);
            $resize->save();
        }
    }
}
