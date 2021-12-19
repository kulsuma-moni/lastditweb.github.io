<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Career;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use Image;
use Str;
use Auth;


class CareerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $careers = career::latest()->get();
        $count = 1;
        return view('admin.career.index_career',compact('careers','count'));
    }
    public function create()
    {
        $careers = career::latest()->get();
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.career.create_career',compact('careers','divisions','districts','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            
            'division_id'=>'required|max:11|integer',
            'district_id'=>'required|max:11|integer',
            'title'=>'required|max:191',
            'slug'=>'required|max:191',
            'experience_year'=>'max:191',
            'address'=>'max:191',
            'job_time'=>'max:191',
            'job_type'=>'max:191',
            'shift'=>'max:191',
            'salary'=>'max:191',
            'benefit'=>'',
            'deadline'=>'max:191',
            'note'=>'',
            'description'=>'',
            'responsibility'=>'',
            'requirement'=>'',
            'meta_tag'=>'',
            'meta_description'=>'',
            'file'=>'',

        ]);

        $career = career::create($data);
        $this->storeImage($career);

        if($career){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
        // if($career){
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


    public function edit(career $career)
    {
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.career.edit_career',compact('career','divisions','districts','count'));
    }


    public function update(career $career ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $career->update([
                'image' => $request->image->store('admin/career','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$career->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image2')){
            if($request->old_image2){
                unlink('storage/app/public/'.$request->old_image2);
            }
            $career->update([
                'image2' => $request->image2->store('admin/career','public'),
            ]);
             $resize = Image::make('storage/app/public/'.$career->image2)->resize(553, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image3')){
            if($request->old_image3){
                unlink('storage/app/public/'.$request->old_image3);
            }
            $career->update([
                'image3' => $request->image3->store('admin/career','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$career->image3)->resize(706, null, function ($constraint) {
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

        $career->update($data);
        if($career){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function delete(career $career)
    {
        if($career->image){
        unlink('storage/app/public/'.$career->image);
        }
        if($career->image2){
        unlink('storage/app/public/'.$career->image2);
        }
        if($career->image3){
        unlink('storage/app/public/'.$career->image3);
        }
      
        $career->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(career $career)
    {
        $career->update(['status' => 1]);
        if($career){
            $notification = array(
                'messege' =>'career activate successfull',
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

    
    public function deactive(career $career)
    {
        $career->update(['status' => 0]);
        if($career){
            $notification = array(
                'messege' =>'career deactivate successfull',
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

    private function storeImage($career)
    {
        if(request()->hasFile('image')){
            $career->update([
                'image' => request()->image->store('admin/career','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$career->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image2')){
            $career->update([
                'image2' => request()->image2->store('admin/career','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$career->image2)->resize(553, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image3')){
            $career->update([
                'image3' => request()->image3->store('admin/career','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$career->image3)->resize(707, null, function ($constraint) {
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
