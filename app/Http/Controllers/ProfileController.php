<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
           /**
     * Create a new controller instance.
     *
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

       
    public function profile(){
        $profiles = Profile::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.profile', compact('profiles'));
    }

     public function store(Request $request)
    {
           $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
            'resume'   => 'mimes:doc,pdf,docx|nullable|max:1000',
            'profile_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload
        if($request->hasFile('resume')){
            //Get filename with the extension
            $docsnameWithExt = $request->file('resume')->getClientOriginalName();
            //Get just docsname
            $docsname = pathinfo($docsnameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            if($extension != ('pdf' || 'doc' || 'docx')){
                $error = "Only docs, docx, pdf file are accepted in Resume`";
                return $error;
            }else{
                //Filename to Store
                $docsNameToStore = $docsname. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('resume')->storeAs('public/resume', $docsNameToStore);
            }
          
        }else{
            $docsNameToStore = 'Nofile.jpg';
        }
        //Handle file upload 
        if($request->hasFile('profile_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        } 
        $profile = new Profile;
        $profile->firstname = $request->input('firstname');
        $profile->lastname = $request->input('lastname');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->freelance = $request->input('freelance');
        $profile->nationality = $request->input('nationality');
        $profile->language = $request->input('language');
        $profile->state = $request->input('state');
        $profile->city = $request->input('city');
        $profile->bio = $request->input('bio');
        $profile->facebook_handle = $request->input('facebook_handle');
        $profile->twitter_handle = $request->input('twitter_handle');
        $profile->instagram_handle = $request->input('instagram_handle');
         $profile->linkedin_handle = $request->input('linkedin_handle');
        $profile->resume = $docsNameToStore;
        $profile->profile_image = $fileNameToStore;

        $profile->save();
        return redirect('/admin/profile')->with('success', 'Personal Data Added successfully');
        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
            'resume'   => 'mimes:doc,pdf,docx|nullable|max:1000',
            'profile_image' => 'image|nullable|max:1999'
        ]);
        //Handle file upload
        if($request->hasFile('resume')){
            //Get filename with the extension
            $docsnameWithExt = $request->file('resume')->getClientOriginalName();
            //Get just docsname
            $docsname = pathinfo($docsnameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            //Filename to Store
            $docsNameToStore = $docsname. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('resume')->storeAs('public/resume', $docsNameToStore);
        }else{
            $docsNameToStore = 'Nofile.jpg';
        }
        //Handle image upload 
        if($request->hasFile('profile_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = Profile::find($id);
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->freelance = $request->freelance;
        $profile->nationality = $request->nationality;
        $profile->language = $request->input('language');
        $profile->state = $request->input('state');
        $profile->city = $request->input('city');
        $profile->bio = $request->input('bio');
        $profile->facebook_handle = $request->input('facebook_handle');
        $profile->twitter_handle = $request->input('twitter_handle');
         $profile->linkedin_handle = $request->input('linkedin_handle');
        $profile->instagram_handle = $request->input('instagram_handle');
        $profile->resume = $docsNameToStore;
        $profile->profile_image = $fileNameToStore;
        $profile->save();
        return redirect('/admin/profile')->with('success', 'updated successfully');
    }

    public function destroy($id)
    {
      $profile = Profile::find($id);
        $profile->delete();
        return redirect('/admin/profile')->with('success', 'Deleted successfully');
    }


}
