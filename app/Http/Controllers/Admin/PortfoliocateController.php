<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Portfoliocate;
use Image;
use Auth;
use Str;

class PortfoliocateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    public function index()
    {
        $portfoliocates = portfoliocate::latest()->get();
        $count = 1;
        return view('admin.portfolio.portfolio_category',compact('portfoliocates','count'));
    }

    public function create(Request $request)
    {
        $this->validateRequest();
        $portfoliocate = portfoliocate::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name).'-'.time(),
            'image'=> $request->image,
        ]);
        $this->storeImage($portfoliocate);
        return redirect()->back()->with('success','portfoliocate Stored Successfully.');
    }

    public function update(portfoliocate $portfoliocate ,Request $request)
    {
        $request->validate([
                'name'=>'required',
                'image'=>'',
        ]);
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/app/public/'.$request->old_image);
            }
            $portfoliocate->update([
                    'image' => $request->image->store('admin/portfoliocate','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$portfoliocate->image)->resize(300,300);
            $resize->save();
        }
        $portfoliocate->update([
                'name' => $request->name,
                'slug'=>Str::slug($request->name).'-'.time(),
        ]);

        return redirect()->back()->with('success','portfoliocate Updated Successfully');

    }

    public function delete(portfoliocate $portfoliocate)
    {
        if($portfoliocate->image){
        unlink('storage/app/public/'.$portfoliocate->image);
        }
        $portfoliocate->delete();
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

    private function storeImage($portfoliocate)
    {
        if(request()->hasFile('image')){
            $portfoliocate->update([
                'image' => request()->image->store('admin/portfoliocate','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$portfoliocate->image)->resize(300,300);
            $resize->save();
        }
    }
}
