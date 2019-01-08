<?php

namespace App\Http\Controllers;

use App\media;
use App\Page;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all()->toArray();

        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Page::create($request->all());
        $page->save();
        return redirect('/page');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $post= Post::orderBy('id','desc')->first();
        $page = Page::find($page->id);

        $medias = Media::All();

        if ($page->modelId==1){
            return view('page.show',  ['page' => $page, 'post'=>$post]);

        }elseif ($page->modelId==2){

            return view('page.show',  ['page' => $page, 'medias'=>$medias]);

        }else{
            return view('page.show',  ['page' => $page]);

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('/page.edit',['page' => $page]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page=Page::find($page->id);

        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->modelId = $request->input('model');
        $page->save();
        return redirect('/page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        Page::destroy($page->id);
        return redirect('/page');
    }
}
