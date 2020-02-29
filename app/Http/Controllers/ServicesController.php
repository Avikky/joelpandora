<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServicesController extends Controller
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

    public function services(){
        $services = Service::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.services', compact('services'));
       
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('title');
        $checkName = Service::where('title', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/services')->with('error', 'Title already exist');
        }
        else { 
            $this->validate($request, [
                'title' => 'required',
                'service_image' => 'image|nullable|max:3000'
            ]);
            //Handle file upload 
            if($request->hasFile('service_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('service_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('service_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('service_image')->storeAs('public/service_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $service = new Service;
            $service->title = $request->input('title');
            $service->description = $request->input('description');
            $service->service_image = $fileNameToStore;
            $service->save();
            return redirect('/admin/services')->with('success', 'New Service added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'service_image' => 'image|nullable|max:3000'
        ]);
        //Handle file upload 
        if($request->hasFile('service_image')){
        
            //Get filename with the extension
            $filenameWithExt = $request->file('service_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('service_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('service_image')->storeAs('public/service_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $service = Service::find($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->service_image = $fileNameToStore;
        $service->save();
        return redirect('/admin/services')->with('success', 'updated successfully');

    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/admin/services')->with('success', 'Deleted successfully');
    }

}
