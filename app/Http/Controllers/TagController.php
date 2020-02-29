<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
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

    public function tags(){
        $tags = Tag::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.tags')->with('tags', $tags);
    }

    
    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Tag::where('name', $nameInput)->first();
        if(isset($checkName)){
            return redirect('/admin/tags')->with('error', 'Tag already exist');
        }else {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }

        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->save();
        return redirect('/admin/tags')->with('success', 'New Tag created');
    }

    public function update(Request $request, $id)
    {
        $nameInput = $request->input('name');
        $checkName = Tag::where('name', $nameInput)->first();
        if(isset($checkName)){
            return redirect('/admin/tags')->with('error', 'Tag already exist');
        }else {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }

        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
        return redirect('/admin/tags')->with('success', 'Update was successful');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/admin/tags')->with('success', 'Deleted successfully');
    }
}
