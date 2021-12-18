<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function dashboard()
    {
    	return view('admin.index');
    }


    //Admin
    public function contactList()
    {
        $contacts = Contact::where('devide',1)->get();
        $count = 1;
        return view('admin.contact.contact_list',compact('contacts','count'));
    }

    public function newCouncellers()
    {
        $councellers = Contact::where('devide',2)->where('status',1)->get();
        $count = 1;
        return view('admin.contact.new_counceller_list',compact('councellers','count'));
    }
    public function councellerList()
    {
        $councellers = Contact::where('devide',2)->where('status',2)->get();
        $count = 1;
        return view('admin.contact.new_counceller_list',compact('councellers','count'));
    }


    public function deactive(contact $contact)
    {
        $contact->update(['status' => 0]);
        if($contact){
            return redirect()->back()->with('success', 'Activate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function active(contact $contact)
    {
        $contact->update(['status' => 2]);
        if($contact){
            return redirect()->back()->with('success', 'Deactivate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

}
