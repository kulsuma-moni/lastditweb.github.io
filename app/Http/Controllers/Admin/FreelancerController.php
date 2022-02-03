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
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.freelancer.create_freelancer',compact('freelancers','divisions','districts','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'division_id'=>'required|max:191',
            'district_id'=>'required|max:191',
            'name'=>'required|max:191',
            'slug'=>'required|max:191|unique:freelancers',
            'email'=>'required|max:191|unique:freelancers',
            'phone'=>'required|max:15',
            'profession'=>'required|max:191',
            'expart_in'=>'',
            'career_obj'=>'',
            'experience_year'=>'max:191',
            'description'=>'',
            'image'=>'required|max:191',
            'image2'=>'max:191',
            'image3'=>'max:191',
            'link'=>'max:191',
            'meta_tag'=>'',

        ]);

        $freelancer = Freelancer::create($data);
        $this->storeImage($freelancer);

        if($freelancer){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
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
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.freelancer.edit_freelancer',compact('freelancer','divisions','districts','count'));
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
            $resize = Image::make('storage/app/public/'.$freelancer->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image2')){
            if($request->old_image2){
                unlink('storage/app/public/'.$request->old_image2);
            }
            $freelancer->update([
                'image2' => $request->image2->store('admin/freelancer','public'),
            ]);
             $resize = Image::make('storage/app/public/'.$freelancer->image2)->resize(403, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image3')){
            if($request->old_image3){
                unlink('storage/app/public/'.$request->old_image3);
            }
            $freelancer->update([
                'image3' => $request->image3->store('admin/freelancer','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$freelancer->image3)->resize(507, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }

        $data = $request->validate([
            'division_id'=>'required|max:191',
            'district_id'=>'required|max:191',
            'name'=>'required|max:191',
            'slug'=>'required|max:191',
            'email'=>'required|max:191',
            'phone'=>'required|max:15',
            'profession'=>'required|max:191',
            'expert_in'=>'',
            'career_obj'=>'',
            'experience_year'=>'max:191',
            'description'=>'',
            'link'=>'max:191',
            'meta_tag'=>'',
        ]);

        $freelancer->update($data);
        if($freelancer){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function delete(Freelancer $freelancer)
    {
        if($freelancer->image){
        unlink('storage/app/public/'.$freelancer->image);
        }
        if($freelancer->image2){
        unlink('storage/app/public/'.$freelancer->image2);
        }
        if($freelancer->image3){
        unlink('storage/app/public/'.$freelancer->image3);
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
        $resize = Image::make('storage/app/public/'.$freelancer->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image2')){
            $freelancer->update([
                'image2' => request()->image2->store('admin/freelancer','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$freelancer->image2)->resize(403, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image3')){
            $freelancer->update([
                'image3' => request()->image3->store('admin/freelancer','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$freelancer->image3)->resize(507, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }
    }


    public function fetchDist($id){
        $district = District::where('division_id',$id)->get();
        return json_encode($district);
    }
}
