<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;

class ProductCategoryController extends Controller
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
 
     public function productcategory(){
         $categoryItems = ProductCategory::orderBy('created_at', 'desc')->paginate(7);
 
         return view('admin.productcategory', compact('categoryItems'));
     }
 
     public function store(Request $request)
     {
        $nameInput = $request->input('name');
        $checkName = ProductCategory::where('name', $nameInput)->first();
         if(isset($checkName)){
             return redirect('/admin/productcategory')->with('error', 'Name already exist');
         }else {
             $this->validate($request, [
                 'name' => 'required'
             ]);
         }
 
        $item = new ProductCategory;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->save();
         return redirect('/admin/productcategory')->with('success', 'New Category created');
     }
 
     public function update(Request $request, $id)
     {
         $nameInput = $request->input('name');
         $checkName = ProductCategory::where('name', $nameInput)->first();
         if(isset($checkName)){
             return redirect('/admin/productcategory')->with('error', 'Name already exist');
         }else {
             $this->validate($request, [
                 'name' => 'required'
             ]);
         }
 
         $item = ProductCategory::find($id);
         $item->name = $request->input('name');
         $item->description = $request->input('description');
         $item->save();

         return redirect('/admin/productcategory')->with('success', 'New Category created');
     }
 
     public function destroy($id)
     {
         $item = ProductCategory::find($id);
         $item->delete();
         return redirect('/admin/productcategory')->with('success', 'Deleted successfully');
     }
}

