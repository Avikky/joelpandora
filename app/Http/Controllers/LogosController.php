<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
class LogosController extends Controller
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


    public function logo(){
        $logos = Logo::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.logo', compact('logos'));
    }

    
    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Logo::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/logo')->with('error', 'Name already exist');
        }
        else { 
            $this->validate($request, [
                'name' => 'required',
                'logo_image' => 'image|nullable|max:10000'
            ]);
            //Handle file upload 
            if($request->hasFile('image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('image')->storeAs('public/logo_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $logo = new Logo;
            $logo->name = $request->input('name');
            $logo->image = $fileNameToStore;
            $logo->save();
            return redirect('/admin/logo')->with('success', 'New record added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo_image' => 'image|nullable|max:10000'
        ]);
        //Handle file upload 
        if($request->hasFile('logo_image')){
        
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/logo_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $logo = Logo::find($id);
        $logo->name = $request->input('name');
        $logo->image = $fileNameToStore;
        $logo->save();
        return redirect('/admin/logo')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $logo = Logo::find($id);
        $logo->delete();
        return redirect('/admin/logo')->with('success', 'Deleted successfully');
    }


}
