<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
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

    public function category(){
        $catItems = Category::orderBy('created_at', 'desc')->paginate(7);

        return view('admin.category')->with('catItems', $catItems);
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Category::where('name', $nameInput)->first();
        if(isset($checkName)){
            return redirect('/admin/category')->with('error', 'Name already exist');
        }else {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }

        $item = new Category;
        $item->name = $request->input('name');
        $str = strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $item->slug = $slug;
        $item->save();
        return redirect('/admin/category')->with('success', 'New Category created');
    }

    public function update(Request $request, $id)
    {
        $nameInput = $request->input('name');
        $checkName = Category::where('name', $nameInput)->first();
        if(isset($checkName)){
            return redirect('/admin/category')->with('error', 'Name already exist');
        }else {
            $this->validate($request, [
                'name' => 'required'
            ]);
        }

        $item = Category::find($id);
        $item->name = $request->input('name');
        $item->save();
        return redirect('/admin/category')->with('success', 'New Category created');
    }

    public function destroy($id)
    {
        $item = Category::find($id);
        $item->delete();
        return redirect('/admin/category')->with('success', 'Deleted successfully');
    }
}
