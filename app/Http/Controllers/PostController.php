<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::role('Admin')->get()->first();
        // dd($admin->id);
        if($admin->id == Auth::user()->id ){
            $posts = Post::with('category')->get();
            return view('admin.posts.manage', compact('posts'));
        }
        else{
            $posts = Post::where('user_id', Auth::user()->id)->with('category')->get();
            return view('admin.posts.manage', compact('posts'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validator->fails()){
            return back()->with('message', $validator->errors()->first());
        }
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/category', $filename);
            $post_image = $filename;
        }

        $post = new Post();
        $post->slug = Str::slug($request->title, '-');
         $post->category_id = $request->category_id;
         $post->user_id = Auth::user()->id;
         $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $post_image;
        $poststore = $post->save();
        if($poststore){
            return redirect()->route('posts')->with("message","Post is added Successfully");
        }else{
            return redirect()->route('posts')->with("message","Post is not added.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('category')->find($id);
        $categories = Category::all();
        return view('admin.posts.update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
        if($validator->fails()){
            return back()->with('message', $validator->errors()->first());
        }
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/category', $filename);
            $post_image = $filename;
        }
        else{
            $post = Post::find($request->id);
            $post->category_id = $request->category_id;
            $post->title = $request->title;
           $post->description = $request->description;
           $poststore = $post->update();
           if($poststore){
               return redirect()->route('posts')->with("message","Post is updated Successfully");
           }else{
               return redirect()->route('posts')->with("message","Post is not updated.");
           }
        }

        // $post = new post();
        $post = Post::find($request->id);
         $post->category_id = $request->category_id;
         $post->name = $request->name;
        $post->price = $request->price;
        $post->description = $request->description;
        $post->image = $post_image;
        $poststore = $post->update();
        if($poststore){
            return redirect()->route('posts')->with("message","post is updated Successfully");
        }else{
            return redirect()->route('posts')->with("message","Product is not updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts')->with('message', 'Post is deleted Successfully');
    }
}
