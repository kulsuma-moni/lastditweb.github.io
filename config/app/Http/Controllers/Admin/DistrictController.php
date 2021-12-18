<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use Image;
use Str;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $districts = District::latest()->get();
        $divisions = Division::latest()->get();
        $count = 1;
        return view('admin.location.district',compact('districts','divisions','count'));
    }


    public function create(Request $request)
    {
        $this->validateRequest();
        $district = District::create([
                'name'=> $request->name,
                'division_id'=> $request->division_id,
                'slug'=> Str::slug($request->name).'-'.time(),
                'image'=> $request->image,
            ]);
        $this->storeImage($district);
        return redirect()->back()->with('success','District Stroed Successfully.');
    }

    public function update(District $district,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/app/public/'.$request->old_image);
            }
            $district->update([
                    'image' => $request->image->store('admin/district','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$district->image)->resize(300,300);
            $resize->save();
        }
        $district->update([
            'division_id'=> $request->division_id,
            'slug'=> Str::slug($request->name).'-'.time(),
            'name'=> $request->name,
        ]);
        return redirect()->back()->with('success','District Updated Successfully.');
    }

    public function delete(District $district)
    {
        if($district->image){
        unlink('storage/app/public/'.$district->image);
        }
        $district->delete();
          return redirect()->back()->with('deletesuccess','Deleted Successfull');
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'division_id'=>'required',
            'name'=>'required',
        ]);
    }

    private function storeImage($district)
    {
        if(request()->hasFile('image')){
            $district->update([
                'image' => request()->image->store('admin/district','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$district->image)->resize(300,300);
            $resize->save();
        }
    }

}
