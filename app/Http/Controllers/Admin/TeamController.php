<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Team;
use Str;
use Image;


class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::latest()->get();
        $count = 1;
        return view('admin.team.team',compact('teams','count'));
    }

    public function create(Request $request)
    {
        $this->validateRequest();
        $team = Team::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name).'-'.rand(2,3),
            'email'=> $request->email,
            'phone'=> $request->phone,
            'link'=> $request->link,
            'description'=> $request->description,
            'image'=> $request->image,
        ]);
        $this->storeImage($team);
        return redirect()->back()->with('success','Team Stored Successfully.');
    }

    public function update(Team $team ,Request $request)
    {
        $request->validate([
                'name'=>'required',
                'image'=>'',
        ]);
        if($request->has('image')){
            if($request->old_image){
                    unlink('storage/app/public/'.$request->old_image);
            }
            $team->update([
                    'image' => $request->image->store('admin/team','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$team->image)->resize(300,300);
            $resize->save();
        }
        $team->update([
                'name' => $request->name,
                'slug'=>Str::slug($request->name).'-'.time(),
        ]);

        return redirect()->back()->with('success','team Updated Successfully');

    }

    public function delete(Team $team)
    {
        if($team->image){
        unlink('storage/app/public/'.$team->image);
        }
        $team->delete();
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

    private function storeImage($team)
    {
        if(request()->hasFile('image')){
            $team->update([
                'image' => request()->image->store('admin/team','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$team->image)->resize(300,300);
            $resize->save();
        }
    }
}
