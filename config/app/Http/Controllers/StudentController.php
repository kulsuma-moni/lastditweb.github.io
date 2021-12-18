<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Student;
use App\Models\Admin\Batch;
use App\Models\Admin\Payment;
use App\Models\User;
use Image;
use Str;
use Hash;

class StudentController extends Controller
{

    public function appliedStudent()
    {
        $students = Student::where('status',0)->latest()->get();
        $count = 1;
        return view('admin.student.applied_student',compact('students','count'));
    }

    public function activeStudent()
    {
        $students = Student::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.student.active_student',compact('students','count'));
    }


    public function create()
    {
        $students = Student::latest()->get();
        $count = 1;
        return view('admin.student.create_student',compact('students','count'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'course_id'=>'required|max:11',
            'batch_id'=>'max:11',
            'name'=>'required',
            'fname'=>'required|max:191',
            'mname'=>'required|max:191',
            'present_address'=>'required|max:191',
            'permanent_address'=>'required|max:191',
            'occupation'=>'max:191',
            'birth_date'=>'required|max:191',
            'nationality'=>'required|max:191',
            'blood_group'=>'max:191',
            'gender'=>'required|max:191',
            'phone'=>'required|max:14',
            'email'=>'required|max:191|unique:students',
            'education'=>'required',
            'ref_name'=>'max:191',
            'ref_batch_name'=>'max:191',
            'ref_relation'=>'max:191',
            'image'=>'required|file|max:300',

        ]);

        $student = Student::create($data);
        $this->storeImage($student);

        return redirect()->back()->with('success', 'Successfully');
        // if($student){
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


    public function info(Student $student)
    {
        $due = $student->course->course_fee - $student->payment->sum('pay');
        $batches = Batch::all();
        return view('admin.student.student_info',compact('student','batches','due'));
    }

    public function payStudent(Student $student,Request $request)
    {

        $due = $student->course->course_fee - $student->payment->sum('pay');
        // request()->validate([
        //     'student_id'=>'required|max:11',
        //     'pay'=>'required',
        // ]);
        if ($due >= $request->pay) { 
            $ammount = Payment::create([
                'student_id' => $student->id,
                'pay' => $request->pay,
            ]);
        // $Newammount = $due - $request->pay;
        return redirect()->back()->with('paysuccess','Pay ' .$request->pay. ' Successfull.');
        }else{
            return redirect()->back()->with('tomuchmoney','The money is too much!! Pay exact. ');
        }
    }
    public function paymentInfo(Student $student)
    {
        $count = 1;
        return view('admin.student.payment_info',compact('student','count'));
    }

    public function confirmStudent(Request $request ,Student $student)
    {

        // $request->validate([

        //     'name'=>'required|max:255',
        //     'email'=>'required|max:191|unique:users',

        // ]);
            $data = $request->validate([

                'roll'=>'required|max:11|unique:students',
                'batch_id'=>'required|max:11',

            ]);

            $student->update([
                'roll'=>$request->roll,
                'batch_id'=>$request->batch_id,
                'status'=>1,
            ]);

            $confirm = User::create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => Hash::make($student->roll),
            ]);

            


        return redirect()->back()->with('success', 'Confirmed Successfully!!');

    }

    public function edit(Student $student)
    {
        return view('admin.student.edit_student',compact('student'));
    }


    public function update(Student $student ,Request $request)
    {
        if($request->has('image')){
            if($request->old_image){
                unlink('storage/app/public/'.$request->old_image);
            }
            $student->update([
                'image' => $request->image->store('admin/student','public'),
            ]);
            // $resize = Image::make('storage/'.$student->image)->resize(250,300);
            // $resize->save();
        }

        $data = $request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'description'=>'required',
            'career'=>'',
            'total_class'=>'required|max:255',
            'duration'=>'required|max:255',
            'course_fee'=>'required|max:255',
            'discount'=>'',
            'meta_tag'=>'',
        ]);

        $student->update($data);

        return redirect()->back()->with('editsuccess', 'Successfully');
    }

    
    public function delete(Student $student)
    {
        if($student->image){
        unlink('storage/app/public/'.$student->image);
        }
      
        $student->delete();
        return redirect()->back()->with('success',"Delete Successfully");
     
    }

    
    public function active(Student $student)
    {
        $student->update(['status' => 1]);
        if($student){
            $notification = array(
                'messege' =>'student activate successfull',
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

    
    public function deactive(Student $student)
    {
        $student->update(['status' => 0]);
        if($student){
            $notification = array(
                'messege' =>'student deactivate successfull',
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

    private function storeImage($student)
    {
        if(request()->hasFile('image')){
            $student->update([
                'image' => request()->image->store('admin/student','public'),
            ]);
        // $resize = Image::make('storage/'.$student->image)->resize(250,300);
        // $resize->save();
        }
    }
}
