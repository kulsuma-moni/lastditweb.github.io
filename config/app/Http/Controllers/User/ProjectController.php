<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class ProjectController extends Controller
{

    //Frontend 

    public function startProject()
    {
        return view('start_project');
    }


    public function createnewProject(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

         if($request->hasFile('image')){
            foreach($request->file('image') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move(public_path('sliderimages'),$name);
                $data[] = $name;
            }
         }

       $project = Project::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'project_type' => $request->project_type1 .'-'.  $request->project_type2 .'-'.  $request->project_type3 .'-'.  $request->project_type4 .'-'. $request->project_type5 .'-'.  $request->project_type6 ,
            'description' => $request->description,
            'budget' => $request->budget,
            'reference' => $request->reference,
            'image' =>json_encode($data),

        ]);

        if($project){
            return redirect()->back()->with('success', 'Message send successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');

        }

    }


    private function storeImage($project)
    {
        if(request()->hasFile('image')){
            $project->update([
                'image' => request()->image->store('admin/project','public'),
            ]);
            $resize->save();
        }
    }
}
