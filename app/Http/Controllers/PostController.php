<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\posts\create;
use App\Models\Post;
use Session;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(5); // this will show the most recent 5 posts
        return view('posts.index')->withPosts($posts);

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
        $this->validate($request, array(
            'title'=>'required',
            'body'=>'required'
        ));
        $post = new Post; // Post is the post model
        $post->title = $request->title;
        $post->body = $request->body;
        //save imgs:
        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();//used time to give it a unique name and time is unique, the get method is to get the form that image originally has exmaple jpg
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }
        $post->save();
        Session::flash('success', 'Your post was successfuly saved !'); // flash, unlike put or get, is used to show the message temporarly and then go
        return redirect()->route('posts.show', $post->id);// post id will be used to show the written post
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id); // post model will find the post with the specific given id
        return view('posts.show')->withPost($post);
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
        return view('posts.edit')->withPost($post);
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
        // $this->validate($request, array(
        //     'title'=>'required',
        //     'body'=>'required'
        // ));

        $post = Post::find($id); // Post is the post model
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        Session::flash('success', 'Your post was successfuly saved !'); // flash, unlike put or get, is used to show the message temporarly and then go
        return redirect()->route('posts.show', $post->id);// post id will be used to show the written post

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
        Session::flash('success', 'Your post was successfuly deleted !'); // flash, unlike put or get, is used to show the message temporarly and then go
        return redirect()->route('posts.index');
    }
}
