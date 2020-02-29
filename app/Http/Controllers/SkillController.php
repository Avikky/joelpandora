<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
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

        
    public function skills(){
        $skills = Skill::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.skills', compact('skills'));
    }

            
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'skill' => 'required',
            'rating' => 'required',
            'years_of_exp' => 'nullable',
          
        ]);
        
        $skill = new Skill;
        $skill->skill = $request->input('skill');
        $skill->rating = $request->input('rating');
        $skill->years_of_exp = $request->input('years_of_exp');
        $skill->save();
        return redirect('/admin/skills')->with('success', 'New item added');
    
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'skill' => 'required',
            'rating' => 'required',
            'years_of_exp' => 'nullable',
          
        ]);
        
    
         $skill = Skill::find($id);
        $skill->skill = $request->input('skill');
        $skill->rating = $request->input('rating');
        $skill->years_of_exp = $request->input('years_of_exp');
        $skill->save();
    return redirect('/admin/skills')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect('/admin/skills')->with('success', 'Deleted successfully');
    }
}
