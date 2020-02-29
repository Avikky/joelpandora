<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
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

        
    public function education(){
        $education = Education::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.education', compact('education'));
    }

      
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required',
            'school' => 'required',
            'duration' => 'nullable',
            'description' => 'nullable'
        ]);
        
        $educate = new Education;
        $educate->title = $request->input('title');
         $educate->course = $request->input('course');
        $educate->school = $request->input('school');
        $educate->duration = $request->input('duration');
        $educate->description = $request->input('description');
        
        $educate->save();
        return redirect('/admin/education')->with('success', 'New item added');
    }

    public function update(Request $request, $id)
    {
       
           $this->validate($request, [
            'title' => 'required',
            'school' => 'required',
            'duration' => 'nullable',
            'description' => 'nullable'
        ]);
        
        $educate = Education::find($id);
        $educate->title = $request->title;
        $educate->course = $request->course;
        $educate->school = $request->school;
        $educate->duration = $request->duration;
        $educate->description = $request->description;
        $educate->save();
        return redirect('/admin/education')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return redirect('/admin/education')->with('success', 'Deleted successfully');
    }
    

}
