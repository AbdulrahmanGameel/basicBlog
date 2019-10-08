<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
        //return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        //handle file upload
        if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just file ext
            $fileExt = $request->file('image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //upload file
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //create a post
        $post = new Post;
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->user_id= auth()->user()->id;
        $post->image=$fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.view')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check for correct user
        if (auth()->user()->id!=$post->user_id) {
            return redirect('/posts')->with('error','unauthorized page');
        }
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required'
        ]);

          //handle file upload
          if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //get just file ext
            $fileExt = $request->file('image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //upload file
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

        }else{

        }

        //update post
        $post = Post::find($id);
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        if($request->hasFile('image')){
            $post->image = $fileNameToStore;
        }
        $post->user_id= auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=POST::find($id);
        if (auth()->user()->id!=$post->user_id) {
            return redirect('/posts')->with('error','unauthorized page');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Removed!');
    }
}
