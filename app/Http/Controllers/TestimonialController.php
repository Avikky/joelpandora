<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
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

    public function testimonial(){
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonial', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'testimony' => 'required',
            't_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload 
        if($request->hasFile('t_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('t_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('t_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('t_image')->storeAs('public/testimonial_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $testimonial = new Testimonial;
        $testimonial->name = $request->input('name');
        $testimonial->testimony = $request->input('testimony');
        $testimonial->t_image = $fileNameToStore;
        $testimonial->save();
        return redirect('/admin/testimonial')->with('success', 'New testimonial added');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'testimony' => 'required',
            't_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload 
        if($request->hasFile('t_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('t_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('t_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('t_image')->storeAs('public/testimonial_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->input('name');
        $testimonial->testimony = $request->input('testimony');
        $testimonial->t_image = $fileNameToStore;
        $testimonial->save();
        return redirect('/admin/testimonial')->with('success', 'Updated successfully');

    }

    public function destroy($id)
    {
        $testimonial = Project::find($id);
        $testimonial->delete();
        return redirect('/admin/testimonial')->with('success', 'Deleted successfully');
    }
}
