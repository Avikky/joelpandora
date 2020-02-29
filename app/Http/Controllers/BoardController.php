<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\User;
class BoardController extends Controller
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


    public function board(){
        $members = Board::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.board')->with('members', $members);
       
    }

    public function store(Request $request)
    {
        $nameInput = $request->input('name');
        $checkName = Board::where('name', $nameInput)->first();

        if(isset($checkName)){
            return redirect('/admin/board')->with('error', 'Name already exist');
        }
        else { 
            $this->validate($request, [
                'name' => 'required',
                'board_image' => 'image|nullable|max:50000'
            ]);
            //Handle file upload 
            if($request->hasFile('board_image')){
          
                //Get filename with the extension
                $filenameWithExt = $request->file('board_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('board_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('board_image')->storeAs('public/board_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $member = new Board;
            $member->name = $request->input('name');
            $member->position = $request->input('position');
            $member->gender = $request->input('gender');
            $member->board_image = $fileNameToStore;
            $member->save();
            return redirect('/admin/board')->with('success', 'New Board member added');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'board_image' => 'image|nullable|max:50000'
        ]);
        //Handle file upload 
            if($request->hasFile('board_image')){
          
                //Get filename with the extension
                $filenameWithExt = $request->file('board_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('board_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename. '_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('board_image')->storeAs('public/board_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            $member = Board::find($id);
            $member->name = $request->input('name');
            $member->position = $request->input('position');
            $member->gender = $request->input('gender');
            $member->board_image = $fileNameToStore;
            $member->save();
            return redirect('/admin/board')->with('success', 'Updated successfully');

    }

    public function destroy($id)
    {
        $member = Board::find($id);
        $member->delete();
        return redirect('/admin/board')->with('success', 'Deleted successfully');
    }

}
