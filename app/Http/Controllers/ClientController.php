<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
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

    
    public function clients(){
        $clients = Client::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.clients', compact('clients'));
    }

    public function store(Request $request){
        $nameInput = $request->input('name');
        $checkName = Client::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/clients')->with('error', 'Name already exist');
        }
        else
        {
            $this->validate($request, [
                'name' => 'required',
                'description' => 'nullable',
                'client_image' => 'image|nullable|max:50000'
            ]);
             //Handle file upload 
             if($request->hasFile('client_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('client_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('client_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('client_image')->storeAs('public/client_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

           $client = new Client;
           $client->name = $request->input('name');
           $client->description = $request->input('description');
           $client->client_image = $fileNameToStore;
           $client->save();

            return redirect('/admin/clients')->with('success', 'New record added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'client_image' => 'image|nullable|max:50000'
        ]);
         //Handle file upload 
         if($request->hasFile('client_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('client_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('client_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('client_image')->storeAs('public/client_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->description = $request->input('description');
        $client->client_image = $fileNameToStore;
        $client->save();

        return redirect('/admin/clients')->with('success', 'updated successfully');
    }

    public function destroy($id)
    {
        $gallery = Client::find($id);
        $gallery->delete();
        return redirect('/admin/clients')->with('success', 'Deleted successfully');
    }
}


