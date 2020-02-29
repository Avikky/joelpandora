<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Session;


class ProductController extends Controller
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

    public function product(){
        $productCategory = ProductCategory::all();
        $products = Product::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.product', compact('products', 'productCategory'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'product_category_id' => 'required',
            'description' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);
        

          //Handle file upload 
          if($request->hasFile('product_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

    
        $product = new Product;
        $product->name = $request->input('name');
        $str = strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $product->slug = $slug;
        $product->product_category_id = $request->input('product_category_id');
        $product->price = $request->input('price');
        $product->currency = $request->input('currency');
        $product->description = $request->input('description');
        $product->product_image = $fileNameToStore;
        $product->save();
        return redirect('/admin/product')->with('success', 'New record added');
        
    }

    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'product_category_id' => 'required',
            'description' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);

          //Handle file upload 
          if($request->hasFile('product_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = Product::find($id);
        $product->name = $request->input('name');
        $str = strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $product->slug = $slug;
        $product->product_category_id = $request->input('product_category_id');
        $product->price = $request->input('price');
        $product->currency = $request->input('currency');
        $product->description = $request->input('description');
        $product->product_image = $fileNameToStore;
        $product->save();
        return redirect('/admin/product')->with('success', 'successfully record updated');
        
    }



}
