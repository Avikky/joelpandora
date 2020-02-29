<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
class GalleryController extends Controller
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

    public function gallery(){
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Gallery::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/gallery')->with('error', 'Name already exist');
        }
        else { 
            $this->validate($request, [
                'name' => 'required',
                'gallery_image' => 'image|nullable|max:50000'
            ]);
            //Handle file upload 
            if($request->hasFile('gallery_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('gallery_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('gallery_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('gallery_image')->storeAs('public/gallery_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $gallery = new Gallery;
            $gallery->name = $request->input('name');
            $gallery->description = $request->input('description');
            $gallery->gallery_image = $fileNameToStore;
            $gallery->save();
            return redirect('/admin/gallery')->with('success', 'New record added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'gallery_image' => 'image|nullable|max:50000'
        ]);
        //Handle file upload 
        if($request->hasFile('gallery_image')){
        
            //Get filename with the extension
            $filenameWithExt = $request->file('gallery_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('gallery_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('gallery_image')->storeAs('public/gallery_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $gallery = Gallery::find($id);
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->gallery_image = $fileNameToStore;
        $gallery->save();
        return redirect('/admin/gallery')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/admin/gallery')->with('success', 'Deleted successfully');
    }

}
