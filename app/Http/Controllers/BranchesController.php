<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchesController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function branches(){
        $branches = Branch::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.branches', compact('branches'));
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Branch::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/branches')->with('error', 'Branch already exist');
        }
        else { 
            $this->validate($request, [
                'name' => 'required',
                'branch_manager' => 'required',
                'location' => 'required'
            ]);
      
            $branches = new Branch;
            $branches->name = $request->input('name');
            $branches->branch_manager = $request->input('branch_manager');
            $branches->location = $request->input('location');
            $branches->save();
            return redirect('/admin/branches')->with('success', 'New branch added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch_manager' => 'required',
            'location' => 'required'
        ]);
       
            $branch = Branch::find($id);
            $branch->name = $request->input('name');
            $branch->branch_manager = $request->input('branch_manager');
            $branch->location = $request->input('location');
            $branch->save();
            return redirect('/admin/branches')->with('success', 'Updated successfully');

    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect('/admin/branches')->with('success', 'Deleted successfully');
    }

}
