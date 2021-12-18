<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Freelancer;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use Image;
use Str;

class FreelancerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $freelancers = Freelancer::latest()->get();
        $count = 1;
        return view('admin.freelancer.index_freelancer',compact('freelancers','count'));
    }
    public function create()
    {
        $freelancers = Freelancer::latest()->get();
        $count = 1;
        return view('admin.freelancer.create_freelancer',compact('freelancers','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:freelancers',
            'description'=>'required',
            'career'=>'',
            'total_class'=>'required|max:255',
            'duration'=>'required|max:255',
            'freelancer_fee'=>'required|max:255',
            'discount'=>'',
            'meta_tag'=>'',
            'image'=>'required|file|max:300',

        ]);

        $freelancer = Freelancer::create($data);
        $this->storeImage($freelancer);

        return redirect()->back()->with('success', 'Successfully');
        // if($freelancer){
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


    public function edit(Freelancer $freelancer)
    {
        return view('admin.freelancer.edit_freelancer',compact('freelancer'));
    }


    public function update(Freelancer $freelancer ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $freelancer->update([
                'image' => $request->image->store('admin/freelancer','public'),
            ]);
            // $resize = Image::make('storage/'.$freelancer->image)->resize(250,300);
            // $resize->save();
        }

        $data = $request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'description'=>'required',
            'career'=>'',
            'total_class'=>'required|max:255',
            'duration'=>'required|max:255',
            'freelancer_fee'=>'required|max:255',
            'discount'=>'',
            'meta_tag'=>'',
        ]);

        $freelancer->update($data);

        return redirect()->back()->with('editsuccess', 'Successfully');
    }

    
    public function delete(Freelancer $freelancer)
    {
        if($freelancer->image){
        unlink('storage/app/public/'.$freelancer->image);
        }
      
        $freelancer->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(Freelancer $freelancer)
    {
        $freelancer->update(['status' => 1]);
        if($freelancer){
            $notification = array(
                'messege' =>'freelancer activate successfull',
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

    
    public function deactive(Freelancer $freelancer)
    {
        $freelancer->update(['status' => 0]);
        if($freelancer){
            $notification = array(
                'messege' =>'freelancer deactivate successfull',
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

    private function storeImage($freelancer)
    {
        if(request()->hasFile('image')){
            $freelancer->update([
                'image' => request()->image->store('admin/freelancer','public'),
            ]);
        // $resize = Image::make('storage/'.$freelancer->image)->resize(250,300);
        // $resize->save();
        }
    }
}
