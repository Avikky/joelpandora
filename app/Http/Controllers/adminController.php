<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Client;
use App\Page;
class adminController extends Controller
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


    public function dashboard(){
        $users = User::all();
        $adminCount = count($users);
        $posts = Post::all();
        $postsCount = count($posts);
        $clients = Client::all();
        $clientsCount =  count($clients);
        return view('admin/dashboard', compact('adminCount','postsCount', 'clientsCount', 'users'));
    }
    
    public function allpages() {
        $pages = Page::all();
        return view('admin.allpages', compact('pages'));
    }


    public function addpage(){
        return view('admin.addpage');
    }

    public function store(Request $request){
        $this->validate($request, [
            'page_name' => 'required',
            'page_title' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload 
        if($request->hasFile('banner')){
            //Get filename with the extension
            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('banner')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('banner')->storeAs('public/banner_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }  

        $page = new Page;

        $page->page_title = $request->input('page_name');
        $str = strtolower($request->page_name);
        $slug = preg_replace('/\s+/', '-', $str);
        $page->page_name = $request->input('page_name');
        $page->page_title = $request->input('page_title');
        $page->banner = $fileNameToStore;
        $page->slug = $slug;
        $page->article_title = $request->input('article_title');
        $page->article = $request->input('article');
        $page->links = $request->input('links');
        $page->link_name = $request->input('link_name');
        $page->link_position = $request->input('link-position');
        $page->list = $request->list;
        $page->images = $request->images;
        $page->sections = $request->sections;
        $page->forms = $request->forms;
        $page->save();

        return redirect('admin/addpage')->with('success', 'Page created successfully');
        
    }

    public function editpage($id){
        $page = Page::find($id);
        return view('admin.editpage', compact('page'));
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('/admin/allpages')->with('success', 'Deleted successfully');
    }

    public function admins(){
        $admins =  User::where('id', '!=', auth()->id())->get();;
        return view('admin.admins')->with('admins', $admins);
    }
}
