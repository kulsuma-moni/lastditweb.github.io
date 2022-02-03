<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Blogcomment;

class BlogcommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([

            'user_id'=>'required|max:11',
            'blog_id'=>'required|max:11',
            'comment'=>'required|min:4|max:300',

        ]);

        $blogcomment = Blogcomment::create($data);
        if($blogcomment){
            return redirect()->back()->with('success', 'Message send successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');

        }
    }
    
    
    
    public function delete(Blogcomment $blogcomment)
    {
      
        $blogcomment->delete();
        return redirect()->back()->with('success',"Comment Deleted Successful");
     
    }
}
