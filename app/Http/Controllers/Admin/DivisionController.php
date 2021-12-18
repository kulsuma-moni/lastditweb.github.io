<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;
use Illuminate\Support\Str;
use Image;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $divisions = Division::latest()->get();
        $count = 1;
        return view('admin.location.division',compact('divisions','count'));
    }

    public function create(Request $request)
    {
        $this->validateRequest();
        $division = Division::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name).'-'.time(),
            'image'=> $request->image,
        ]);
        $this->storeImage($division);
        return redirect()->back()->with('success','Division Stored Successfully.');
    }

    public function update(Division $division ,Request $request)
    {
        $request->validate([
                'name'=>'required',
                'image'=>'',
        ]);
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/app/public/'.$request->old_image);
            }
            $division->update([
                    'image' => $request->image->store('admin/division','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$division->image)->resize(300,300);
            $resize->save();
        }
        $division->update([
                'name' => $request->name,
                'slug'=>Str::slug($request->name).'-'.time(),
        ]);

        return redirect()->back()->with('success','Division Updated Successfully');

    }

    public function delete(Division $division)
    {
        if($division->image){
        unlink('storage/app/public/'.$division->image);
        }
        $division->delete();
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

    private function storeImage($division)
    {
        if(request()->hasFile('image')){
            $division->update([
                'image' => request()->image->store('admin/division','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$division->image)->resize(300,300);
            $resize->save();
        }
    }
}
