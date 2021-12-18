<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Portfoliocate;
use App\Models\Admin\Portfolio;
use Image;
use Auth;
use Str;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function portfolios()
    {
        $portfolios =  Portfolio::where('user_id',Auth::user()->id)->where('status',1)->get();
        $count = 1;
        return view('editor.portfolio.index_portfolio',compact('portfolios','count'));
    }
    public function userdeactiveportfolio()
    {
        $portfolios =  Portfolio::where('user_id',Auth::user()->id)->where('status',0)->get();
        $count = 1;
        return view('editor.portfolio.index_portfolio',compact('portfolios','count'));
    }
    public function index()
    {
        $portfolios = Portfolio::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.portfolio.index_portfolio',compact('portfolios','count'));
    }
    public function create()
    {
        $portfoliocates = Portfoliocate::latest()->get();
        $count = 1;
        return view('admin.portfolio.create_portfolio',compact('portfoliocates','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'portfoliocate_id'=>'required|max:11',
            'user_id'=>'required|max:11',
            'name'=>'required|max:191',
            'slug'=>'required|max:191|unique:portfolios',
            'description'=>'required',
            'link'=>'required|max:191',
            'meta_tag'=>'',
            'image'=>'required|file|max:300',

        ]);

        $portfolio = Portfolio::create($data);
        $this->storeImage($portfolio);

        return redirect()->back()->with('success', 'Successfully');
        // if($portfolio){
        //     $notification = array(
        //         'messege' =>'portfolio added successfull',
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


    public function edit(Portfolio $portfolio)
    {
        $portfoliocates = Portfoliocate::all();
        return view('admin.portfolio.edit_portfolio',compact('portfolio','portfoliocates'));
    }


    public function update(Portfolio $portfolio ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $portfolio->update([
                'image' => $request->image->store('admin/portfolio','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$portfolio->image)->resize(360,300);
            $resize->save();
        }

        $data = $request->validate([
    
            'portfoliocate_id'=>'required|max:11',
            'name'=>'required|max:191',
            'slug'=>'max:191',
            'description'=>'required',
            'link'=>'required|max:191',
            'meta_tag'=>'',

        ]);

        $portfolio->update($data);

        return redirect()->back()->with('success', 'Portfolio Updated Successfully!!');
    }

    
    public function delete(Portfolio $portfolio)
    {
        if($portfolio->image){
        unlink('storage/app/public/'.$portfolio->image);
        }
      
        $portfolio->delete();
        return redirect()->back()->with('deletesuccess',"Delete Successfully");
     
    }

    
    public function active(Portfolio $portfolio)
    {
        $portfolio->update(['status' => 1]);
        return redirect()->back()->with('success',"Activate Successfully");
        
    }

    
    public function deactive(Portfolio $portfolio)
    {
        $portfolio->update(['status' => 0]);
        return redirect()->back()->with('deletesuccess',"De-activate Successfully");
    }

    public function deactiveList()
    {
        $portfolios = Portfolio::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.portfolio.deactive_portfolio',compact('portfolios','count'));
    }

    private function storeImage($portfolio)
    {
        if(request()->hasFile('image')){
            $portfolio->update([
                'image' => request()->image->store('admin/portfolio','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$portfolio->image)->resize(360,300);
            $resize->save();
        }
    }

}
