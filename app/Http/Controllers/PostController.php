<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckUser;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckUser::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc("created_at");

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post;
        if ($request->file('image')) {
            $this->validate($request, ['image' => 'mimes:jpg,png,jpeg|max:2048']);

            $image = $request->file('image');
            $destinationPath = 'img';
            $file_name = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $file_name);

            $post->original_name = $image->getClientOriginalName();
            $post->file_name = $file_name;

        }
        $post->title =  $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $post = Post::find($post->id);
        return view('post.show',  ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('/post.edit',['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post=Post::find($post->id);
        if ($request->delete==1){
            $post->original_name = null;
            $post->file_name = null;
        }
        if ($request->file('image')) {
            $this->validate($request, ['image.*' => 'mimes:jpeg,jpg,png|max:2048']);

            $image = $request->file('image');
            $destinationPath = 'img';
            $file_name = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $file_name);

            $post->original_name = $image->getClientOriginalName();
            $post->file_name = $file_name;

        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');


        $post->save();
        return redirect('/post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
//        dd($post);

//
        $pathToFile = public_path("img/" .$post->file_name);
        \File::delete($pathToFile);
        Post::destroy($post->id);

        return redirect('/post');


    }


}
