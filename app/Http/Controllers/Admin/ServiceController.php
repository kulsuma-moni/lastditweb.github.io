<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use Image;
use Str;
use Auth;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $services =  service::where('status',1)->get();
        $count = 1;
        return view('admin.service.index_service',compact('services','count'));
    }

    public function create()
    {
        return view('admin.service.create_service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
        ]);

        $service = service::create([

            'title'=>$request->title,
            'slug'=> Str::slug($request->title).'-'.time(),
            'image'=>$request->image,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        $this->storeImage($service);
        if($service){
            return redirect()->back()->with('success', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    //service EDIT
    public function edit(service $service,Request $request)
    {
        $count = 1 ;

        return view('admin.service.edit_service',compact('service','count'));
    }


    //service UPDATE

    public function update(service $service,Request $request)
    {
        $request->validate([
            'description'=>'required',
        ]);


         if($request->has('image')){
             if($request->old_image){
                 unlink('storage/app/public/'.$request->old_image);
             }
             $service->update([
                 'image' => $request->image->store('admin/service','public'),
             ]);
            $resize = Image::make('storage/app/public/'.$service->image)->resize(1000,500);
            $resize->save();
         }



        $service->update([

            'title'=>$request->title,
            // 'slug'=> Str::slug($request->title).'-'.time(),
            // 'servicecate_id'=>$request->servicecate_id,
            // 'user_id'=> Auth::id(),
            // 'image'=>$request->image,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        // $this->storeImage($service);

        if($service){
            return redirect()->back()->with('success', 'service Updated Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    public function delete(service $service)
    {
        if($service->image){
        unlink('storage/app/public/'.$service->image);
        }
      
        $service->delete();
        if($service){
            return redirect()->back()->with('deletesuccess', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function active(service $service)
    {
        $service->update(['status' => 1]);
        if($service){
            return redirect()->back()->with('success', 'service Activate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function deactive(service $service)
    {
        $service->update(['status' => 0]);
        if($service){
            return redirect()->back()->with('success', 'service Deactivate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    public function deactiveList()
    {
        $services =service::where('status',0)->get();
        $count = 1 ;
        return view('admin.service.deactive_service',compact('services','count'));
    }

    public function activeList()
    {
        $services =service::where('status',1)->get();
        return view('admin.service.service_deactive',compact('services'));
    }




    //PUBLIC FUNCTIONS
    // private function validateRequest()
    // {
        
    //     return request()->validate([
    //         'title'=>'required',
    //         'slug'=> 'required',
    //         'servicecate_id'=>'required',
    //         'quantity'=>'required',
           
    //         'price'=>'required',
    //         'description'=>'required',
            
    //     ]);
    // }


    private function storeImage($service)
    {
        if(request()->hasFile('image')){
            $service->update([
                'image' => request()->image->store('admin/service','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$service->image)->resize(1000,500);
            $resize->save();
        }
    }


}
