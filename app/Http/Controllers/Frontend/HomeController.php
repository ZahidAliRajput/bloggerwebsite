<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Home(){
        $posts = Post::all();
        return view('frontend.posts.manage', compact('posts'));
    }

    public function Contact(){
        return view('frontend.contact');
    }

    public function AboutUs(){
        return view('frontend.aboutus');
    }

    public function Categories(){
        
        $categories = Category::all();
        if(count($categories) > 0)
        {
            return view('frontend.categories', compact('categories'));
        }
        else{
            return view('frontend.categories')->with('message', 'Category not Found');    
        }
    }
    

    public function SinglePost($slug){
        // $post = Post::with('category')->find($slug)->get();
        $post = Post::where('slug', $slug)->with('category')->first();
        $categories = Category::all();
        return view('frontend.posts.singlepost', compact('post', 'categories'));
    }

    public function CategoryPosts($id){
        // $posts = Post::where('category_id', $id);
        $posts = Post::with('user')->where('category_id', $id)->get();
       return view('frontend.categoryposts', compact('posts'));
    }
}
