<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Entrepreneur;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use Image;
use Str;


class EntrepreneurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $entrepreneurs = entrepreneur::latest()->get();
        $count = 1;
        return view('admin.entrepreneur.index_entrepreneur',compact('entrepreneurs','count'));
    }
    public function create()
    {
        $entrepreneurs = entrepreneur::latest()->get();
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.entrepreneur.create_entrepreneur',compact('entrepreneurs','divisions','districts','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'division_id'=>'required|max:191',
            'district_id'=>'required|max:191',
            'name'=>'required|max:191',
            'slug'=>'required|max:191|unique:entrepreneurs',
            'email'=>'required|max:191|unique:entrepreneurs',
            'phone'=>'required|max:15',
            'profession'=>'required|max:191',
            'expart_in'=>'',
            'career_obj'=>'',
            'experience_year'=>'max:191',
            'description'=>'',
            'image'=>'required',
            'image2'=>'',
            'image3'=>'',
            'link'=>'max:191',
            'meta_tag'=>'',

        ]);

        $entrepreneur = entrepreneur::create($data);
        $this->storeImage($entrepreneur);

        if($entrepreneur){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
        // if($entrepreneur){
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


    public function edit(entrepreneur $entrepreneur)
    {
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $count = 1;
        return view('admin.entrepreneur.edit_entrepreneur',compact('entrepreneur','divisions','districts','count'));
    }


    public function update(entrepreneur $entrepreneur ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $entrepreneur->update([
                'image' => $request->image->store('admin/entrepreneur','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$entrepreneur->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image2')){
            if($request->old_image2){
                unlink('storage/app/public/'.$request->old_image2);
            }
            $entrepreneur->update([
                'image2' => $request->image2->store('admin/entrepreneur','public'),
            ]);
             $resize = Image::make('storage/app/public/'.$entrepreneur->image2)->resize(453, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
        if($request->has('image3')){
            if($request->old_image3){
                unlink('storage/app/public/'.$request->old_image3);
            }
            $entrepreneur->update([
                'image3' => $request->image3->store('admin/entrepreneur','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$entrepreneur->image3)->resize(506, null, function ($constraint) {
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

        $entrepreneur->update($data);
        if($entrepreneur){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function delete(entrepreneur $entrepreneur)
    {
        if($entrepreneur->image){
        unlink('storage/app/public/'.$entrepreneur->image);
        }
        if($entrepreneur->image2){
        unlink('storage/app/public/'.$entrepreneur->image2);
        }
        if($entrepreneur->image3){
        unlink('storage/app/public/'.$entrepreneur->image3);
        }
      
        $entrepreneur->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(entrepreneur $entrepreneur)
    {
        $entrepreneur->update(['status' => 1]);
        if($entrepreneur){
            $notification = array(
                'messege' =>'entrepreneur activate successfull',
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

    
    public function deactive(entrepreneur $entrepreneur)
    {
        $entrepreneur->update(['status' => 0]);
        if($entrepreneur){
            $notification = array(
                'messege' =>'entrepreneur deactivate successfull',
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

    private function storeImage($entrepreneur)
    {
        if(request()->hasFile('image')){
            $entrepreneur->update([
                'image' => request()->image->store('admin/entrepreneur','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$entrepreneur->image)->resize(706, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image2')){
            $entrepreneur->update([
                'image2' => request()->image2->store('admin/entrepreneur','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$entrepreneur->image2)->resize(453, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $resize->save();
        }

        if(request()->hasFile('image3')){
            $entrepreneur->update([
                'image3' => request()->image3->store('admin/entrepreneur','public'),
            ]);
        $resize = Image::make('storage/app/public/'.$entrepreneur->image3)->resize(607, null, function ($constraint) {
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
