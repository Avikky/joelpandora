<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Project;
use App\Category;
use App\User;
use App\Tag;
use App\Experience;
use App\Education;
use App\Skill;

class PagesController extends Controller
{
    public function index(){     
        $profile = Profile::where('id', 1)->first();
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        $experiences = Experience::orderBy('created_at', 'desc')->paginate(10);
        $educations = Education::orderBy('created_at', 'desc')->paginate(10);
        $skills = Skill::orderBy('created_at', 'desc')->paginate(10);
        return view('/index', compact('profile', 'projects','experiences', 'educations', 'skills'));
    }

    public function showBlogPosts(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $tags =  Tag::all();
       
        return view('blog', compact('posts', 'categories', 'tags'));
    }

    public function showBlogCategory($category_id){
        $posts = Post::where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
         $tags = Tag::all();
        return view('blogcategory', compact('posts', 'categories', 'tags'));
    }

    public function blogPost($slug){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();   
        return view('blogpost', compact('post', 'posts', 'categories'));
    }

    // public function contact(){
    //     return view('pages.contact');
    // }

    public function contactmail(Request $request){
         
        $name = $request->input('name');
        $email = $request->input('email');
        $title =  $request->input('subject');
        $msg = $request->input('message');
        
        $toEmail = 'info@specstechafrica.com';
        $subject =  'Contact Request From '.$name;
        $body = ' <h2> Contact Request </h2>
                <h4>Name:</h4><span>'.$name.'</span>
                <h4>Email:</h4><span>'.$email.'</span>
                <br>
                <h3>'.$title.'</h4>
                <br>
                <h4>Message:</h4><p>'.$msg.'</p>
        ';
        
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
        
        //Addittional Headers
        $headers .= "From: " .$name. "<".$email. ">". "\r\n";
       
        $done = mail($toEmail, $subject, $body, $headers);
        
        if($done)
        {
             return redirect('/contact')->with('success', 'Your email has been sent');
        }
        else
        {
            //Failed
              return redirect('/contact')->with('error', 'Your email was not sent please try again');
        }
        
    }
    
}
