<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Career;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Careerapply;
use App\Models\User;
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

    public function view(Career $career)
    {
        return view('admin.career.view_career',compact('career'));
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


    public function update(Career $career ,Request $request)
    {
        if($request->has('file')){
            if($request->old_file){
                unlink('storage/app/public/'.$request->old_file);
            }
            $career->update([
                'file' => $request->file->store('admin/career','public'),
            ]);
            // $resize = Image::make('storage/app/public/'.$career->file)->resize(706, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $resize->save();
        }

        $data = $request->validate([


            'division_id'=>'required|max:11|integer',
            'district_id'=>'required|max:11|integer',
            'title'=>'required|max:191',
            // 'slug'=>'required|max:191',
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

        $career->update($data);
        if($career){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function delete(career $career)
    {
        if($career->file){
        unlink('storage/app/public/'.$career->file);
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
        if(request()->hasFile('file')){
            $career->update([
                'file' => request()->file->store('admin/career','public'),
            ]);
        // $resize = Image::make('storage/app/public/'.$career->file)->resize(706, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });
        // $resize->save();
        }

    }


    public function fetchDist($id){
        $district = District::where('division_id',$id)->get();
        return json_encode($district);
    }


    //Career All Applied Applicants Functions 

    public function careerApplied()
    {
        $careerapplied = Careerapply::latest()->get();
        $count = 1;
        return view('admin.career.new_applied',compact('careerapplied','count'));
    }


    public function viewApplicant(careerapply $applicant)
    {
        return view('admin.career.view_applicant',compact('applicant'));
     
    }

    public function deleteApplicant(careerapply $careerapply)
    {
        if($careerapply->file){
        unlink('storage/app/public/'.$careerapply->file);
        }
        if($careerapply->image){
        unlink('storage/app/public/'.$careerapply->image);
        }
      
        $careerapply->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function activeApplicant(careerapply $careerapply)
    {
        $careerapply->update(['status' => 1]);
        if($careerapply){
            $notification = array(
                'messege' =>'careerapply activate successfull',
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

    
    public function deactiveApplicant(careerapply $careerapply)
    {
        $careerapply->update(['status' => 0]);
        if($careerapply){
            $notification = array(
                'messege' =>'careerapply deactivate successfull',
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



}
