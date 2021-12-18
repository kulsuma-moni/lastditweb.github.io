<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User\Userdetail;
use Auth;
use Image;

class EditorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $editors =  user::where('is_editor',0)->get();
        $count = 1;
        return view('admin.editor.new_editors',compact('editors','count'));
    }

    public function profile()
    {
        $profile = user::findOrFail(Auth::id());
        return view('editor.profile.profile',compact('profile'));
    }

    public function create()
    {
        $user = user::findOrFail(Auth::id());
        return view('editor.profile.add_profile',compact('user'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'user_id'=>'max:191',
            'profession'=>'max:191',
            'nationality'=>'max:191',
            'blood_group'=>'max:191',
            'birth_date'=>'max:191',
            'gender'=>'max:191',
            'phone'=>'max:191',
            'address'=>'max:191',
            'fb_link'=>'',
            'twitter_link'=>'',
            'instagram_link'=>'',
            'github_link'=>'',
            'linkedin_link'=>'',
            'description'=>'',
            'image'=>'file|max:300',

        ]);

        $userdetail = Userdetail::create($data);
        $this->storeImage($userdetail);

        return redirect()->back()->with('success', 'Successfully');
    }

    public function update(Request $request,Userdetail $userdetail)
    {

        $data = $request->validate([

            'user_id'=>'max:191',
            'profession'=>'max:191',
            'nationality'=>'max:191',
            'blood_group'=>'max:191',
            'birth_date'=>'max:191',
            'gender'=>'max:191',
            'phone'=>'max:191',
            'address'=>'max:191',
            'fb_link'=>'',
            'twitter_link'=>'',
            'instagram_link'=>'',
            'github_link'=>'',
            'linkedin_link'=>'',
            'description'=>'',
            'image'=>'file|max:300',

        ]);

        $userdetail->update($data);
        $this->storeImage($userdetail);

        return redirect()->back()->with('success', 'Successfully');
    }


    private function storeImage($userdetail)
    {
        if(request()->hasFile('image')){
            $userdetail->update([
                'image' => request()->image->store('admin/userdetail','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$userdetail->image)->resize(360,300);
            $resize->save();
        }
    }



    public function edit()
    {
        $user = user::findOrFail(Auth::id());
        return view('editor.profile.edit_profile',compact('user'));
    }

    public function active(User $user)
    {
        $user->update(['is_editor' => 2]);
        return $user;
    }

    public function delete(user $user)
    {
        if($user->image){
        unlink('storage/app/public/'.$user->image);
        }
      
        $user->delete();
        if($user){
            return redirect()->back()->with('deletesuccess', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function deactive(User $editor)
    {
        $editor->update(['status' => 0]);
        if($editor){
            return redirect()->back()->with('success', 'user Deactivate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    public function deactiveList()
    {
        $users =user::where('status',0)->get();
        return view('admin.user.deactive_user',compact('users'));
    }

    public function activeList()
    {
        $users =user::where('status',1)->get();
        return view('admin.user.user_deactive',compact('users'));
    }


}
