<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
class TrainingController extends Controller
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


    public function training(){
        $trainings = Training::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.training', compact('trainings'));
    }


       
    public function store(Request $request)
    {
        $nameInput = $request->input('title');
        $checkName = Training::where('title', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/training')->with('error', 'Name already exist');
        }
        else { 
            $this->validate($request, [
                'title' => 'required',
                'class_banner' => 'image|required|max:30000',
                'start_date' => 'required',
                'start_time' => 'required'
            ]);
            //Handle file upload 
            if($request->hasFile('class_banner')){
                //Get filename with the extension
                $filenameWithExt = $request->file('class_banner')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('class_banner')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('class_banner')->storeAs('public/class_banners', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
      
            $training = new Training;
            $training->title = $request->input('title');
            $str = strtolower($request->title);
            $slug = preg_replace('/\s+/', '-', $str);
            $training->slug = $slug;
            $training->start_date = $request->input('start_date');
            $training->start_time = $request->input('start_time');
            $training->end_date = $request->input('end_date');
            $training->class_banner = $fileNameToStore;
            $training->save();

            return redirect('/admin/training')->with('success', 'Training Class added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'class_banner' => 'image|required|max:30000',
            'start_date' => 'required',
            'start_time' => 'required'
        ]);

         //Handle file upload 
         if($request->hasFile('class_banner')){
            //Get filename with the extension
            $filenameWithExt = $request->file('class_banner')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('class_banner')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('class_banner')->storeAs('public/class_banners', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
  
        $training = Training::find($id);
        $training->title = $request->input('title');
        $training->start_date = $request->input('start_date');
        $training->start_time = $request->input('start_time');
        $training->end_date = $request->input('end_date');
        $training->class_banner = $fileNameToStore;
        $training->save();

        return redirect('/admin/training')->with('success', 'Training Class updated');
    }

    public function destroy($id)
    {
        $training = Training::findorFail($id);
        $training->delete();
        return redirect('/admin/training')->with('success', 'Deleted successfully');
    }

}
