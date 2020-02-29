<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;

class SettingsController extends Controller
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

    
    public function settings()
    {
        $feature = Setting::where('id', '=', 1)->first();
        return view('admin.settings', compact('feature'));
    }

    public function store(Request $request){
        $nameInput = $request->input('site_name');
        $checkName = Setting::where('site_name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/settings')->with('error', 'Feature already exist check table to see existing feature');
        }
        else { 
        $set = new Setting;
        $set->site_name = $request->site_name;
        $set->slogan = $request->slogan;
        $set->email = $request->email;
        $set->phone = $request->phone;
        $set->address = $request->address;
        $set->mission = $request->mission;
        $set->vision = $request->vision;
        $set->about = $request->about;
        $set->facebook = $request->facebook;
        $set->twitter = $request->twitter;
        $set->instagram = $request->instagram;
        $set->youtube = $request->youtube;
        $set->pinterest = $request->pinterest;
        $set->save();

            return redirect('/admin/settings')->with('success', 'New Feature added');
        }
    }

    public function update(Request $request, $id)
    {
        // $id = 1;
        $feature = Setting::find($id);
        $feature->site_name = $request->input('site_name');
        $feature->slogan = $request->input('slogan');
        $feature->email = $request->input('email');
        $feature->phone = $request->input('phone');
        $feature->address = $request->input('address');
        $feature->mission = $request->input('mission');
        $feature->vision = $request->input('vision');
        $feature->about = $request->input('about');
        $feature->facebook = $request->input('facebook');
        $feature->twitter = $request->input('twitter');
        $feature->instagram = $request->input('instagram');
        $feature->youtube = $request->input('youtube');
        $feature->pinterest = $request->input('pinterest');
        $feature->save();
        return redirect('/admin/settings')->with('success', 'Updated successfully');
    }

}
