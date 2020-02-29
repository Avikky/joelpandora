<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function project(){
        $projects = Project::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.project', compact('projects'));
    }

    
    public function store(Request $request)
    {
       
            $this->validate($request, [
                'project_name' => 'required',
                'project_image' => 'image|nullable|max:1999'
            ]);
            //Handle file upload 
            if($request->hasFile('project_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('project_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('project_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('project_image')->storeAs('public/project_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $project = new Project;
            $project->project_name = $request->input('project_name');
            $project->designated_client = $request->input('designated_client');
            $project->start_date = $request->input('start_date');
            $project->finish_date = $request->input('finish_date');
            $project->project_link = $request->input('project_link');
            $project->description = $request->input('description');
            $project->project_image = $fileNameToStore;
            $project->save();
            return redirect('/admin/project')->with('success', 'New Project added');
            

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'project_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload 
        if($request->hasFile('project_image')){
        
            //Get filename with the extension
            $filenameWithExt = $request->file('project_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('project_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('project_image')->storeAs('public/project_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $project = Project::find($id);
        $project->project_name = $request->input('project_name');
        $project->designated_client = $request->input('designated_client');
        $project->start_date = $request->input('start_date');
        $project->finish_date = $request->input('finish_date');
         $project->project_link = $request->input('project_link');
        $project->description = $request->input('description');
        $project->project_image = $fileNameToStore;
        $project->save();
        return redirect('/admin/project')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/admin/project')->with('success', 'Deleted successfully');
    }
    
}
