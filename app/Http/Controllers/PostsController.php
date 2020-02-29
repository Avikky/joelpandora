<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('draft',  NULL)->orwhere('draft', 0)->orderBy('created_at', 'desc')->paginate(7);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddPost()
    {
        $tags = Tag::all();
        $categories = Category::all();
         return view('admin.posts.create', compact('tags', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        //dd($request);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'nullable|integer',
            'cover_image' => 'image|nullable|max:1999'
        ]);
     

        //Handle file upload 
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create post
        $post = new Post;
        $post->title = $request->input('title');
        $str = strtolower($request->title);
        $slug = preg_replace('/\s+/', '-', $str);

            $post->slug = $slug;
            $post->title = $request->input('title');
            $post->body = $request->body;
            $post->category_id = $request->input('category_id');
            $post->user_id = auth()->user()->id;
            $post->cover_image = $fileNameToStore;
            $post->draft = $request->input('draft');
            $post->save();

            $post->tags()->sync($request->tags, false);

        return redirect('/admin/posts')->with('success', 'New post created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singlepost($slug)
    {
        return view('admin.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editpost($id)
    {
       
        $post = Post::find($id);
        // return $post;
        $categories = Category::all();
        $tags = Tag::all();
        $tags2 = array();
        // foreach($tags as $tag) {
        //     $tags2[$tag->id] = $tag->name;
        // }
        return view('admin.posts.edit', compact('post', 'categories', 'tags2', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload 
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Update post
            $post = Post::find($id);
            $post->title = $request->input('title');
            $str = strtolower($request->title);
            $slug = preg_replace('/\s+/', '-', $str);
    
            $post->slug = $slug;
            $post->body = $request->input('body');
            $post->category_id = $request->input('category_id');
            $post->cover_image = $fileNameToStore;
            $post->draft = $request->input('draft');
            $post->save();
            $post->tags()->sync($request->tags, true);
        return redirect('admin/posts')->with('success', 'Post Updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect('/admin/posts')->with('success', 'Post Deleted');
    }


    public function draft(){
        $drafts = Post::where('draft',  1)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin/posts/draft', compact('drafts', 'categories', 'tags'));
    }
    
    public function publish(Request $request, $id) {
        $dell = Post::find($id);
        $dell->update(['draft' => Null]);
        return redirect()->route('draft')->with('success', 'Post Published');
    }

    
}
