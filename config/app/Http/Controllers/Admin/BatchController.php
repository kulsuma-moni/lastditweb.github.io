<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Batch;
use App\Models\Admin\Course;
use Image;
use Str;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $batches = Batch::latest()->get();
        $courses = Course::latest()->get();
        $count = 1;
        return view('admin.batch.index_batch',compact('batches','courses','count'));
    }
    public function create()
    {
        $batches = Batch::latest()->get();
        $courses = Course::latest()->get();
        $count = 1;
        return view('admin.batch.create_batch',compact('batches','courses','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'course_id'=>'required|max:255',
            'batch_number'=>'required|max:11|unique:batches',
            'duration'=>'',
            'starting_at'=>'required|max:255',
            'ending_at'=>'required|max:255',
            'class_time'=>'',

        ]);

        $batch = Batch::create($data);

        return redirect()->back()->with('success', 'Batch Created Successfully');
        // if($batch){
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


    public function edit(Batch $batch)
    {
        $courses = Course::latest()->get();
        return view('admin.batch.edit_batch',compact('batch','courses'));
    }


    public function update(Batch $batch ,Request $request)
    {

        $data = $request->validate([
            'course_id'=>'required|max:255',
            'batch_number'=>'required|max:11',
            'duration'=>'',
            'starting_at'=>'required|max:255',
            'ending_at'=>'required|max:255',
            'class_time'=>'',
        ]);

        $batch->update($data);

        return redirect()->back()->with('editsuccess', 'Batch Edited Successfully');
    }

    
    public function delete(Batch $batch)
    {
        if($batch->image){
        unlink('storage/app/public/'.$batch->image);
        }
      
        $batch->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(Batch $batch)
    {
        $batch->update(['status' => 1]);
        if($batch){
            $notification = array(
                'messege' =>'batch activate successfull',
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

    
    public function deactive(Batch $batch)
    {
        $batch->update(['status' => 0]);
        if($batch){
            $notification = array(
                'messege' =>'batch deactivate successfull',
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

    private function storeImage($batch)
    {
        if(request()->hasFile('image')){
            $batch->update([
                'image' => request()->image->store('admin/batch','public'),
            ]);
        // $resize = Image::make('storage/'.$batch->image)->resize(250,300);
        // $resize->save();
        }
    }
}
