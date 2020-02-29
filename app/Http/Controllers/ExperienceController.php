<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;

class ExperienceController extends Controller
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

        
    public function experience(){
        $experiences = Experience::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.experience', compact('experiences'));
    }

          
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required',
            'duration' => 'required',
            'description' => 'nullable'
        ]);
        
        $experience = new Experience;
        $experience->title = $request->input('title');
        $experience->duration = $request->input('duration');
         $experience->company = $request->input('company');
        $experience->description = $request->input('description');
        
        $experience->save();
        return redirect('/admin/experience')->with('success', 'New item added');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'title' => 'required',
            'duration' => 'required',
            'company' => 'required',
            'description' => 'nullable'
        ]);
        
    
        $experience = Experience::find($id);
        $experience->title = $request->input('title');
        $experience->duration = $request->input('duration');
        $experience->company = $request->input('company');
        $experience->description = $request->input('description');
        
        $experience->save();
    return redirect('/admin/experience')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect('/admin/experience')->with('success', 'Deleted successfully');
    }

}
