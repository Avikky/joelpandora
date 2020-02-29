<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
class PartnersController extends Controller
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

    public function partners(){
  
        $partners = Partner::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.partners', compact('partners'));
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Partner::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/partners')->with('error', 'Name already exist');
        }
        else { 
            $this->validate($request, [
                'name' => 'required',
                'partner_image' => 'image|nullable|max:1999'
            ]);
           
            //Handle file upload 
            if($request->hasFile('partner_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('partner_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('partner_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('partner_image')->storeAs('public/partner_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $partner = new Partner;
            $partner->name = $request->input('name');
            $partner->partner_image = $fileNameToStore;
            $partner->save();
            return redirect('/admin/partners')->with('success', 'New record added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'partner_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload 
        if($request->hasFile('partner_image')){
        
            //Get filename with the extension
            $filenameWithExt = $request->file('partner_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('partner_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('partner_image')->storeAs('public/partner_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $partner = Partner::find($id);
        $partner->name = $request->input('name');
        $partner->partner_image = $fileNameToStore;
        $partner->save();
        return redirect('/admin/partners')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect('/admin/partners')->with('success', 'Deleted successfully');
    }
}
