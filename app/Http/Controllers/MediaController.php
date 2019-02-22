<?php

namespace App\Http\Controllers;

use App\media;
use File;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medias = Media::all()->sortByDesc("created_at");

        return view('media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
        $this->validate($request, ['image' => 'mimes:pdf']);

        $image = $request->file('image');
            $destinationPath = 'pdf';
            $file_name = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $file_name);
            $img = new Media;
            $img->original_name = $image->getClientOriginalName();
            $img->title = $request->title;
            $img->file_name = $file_name;
            $img->save();
            return redirect('media');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function show( $media)
    {
        $themedia = Media::find($media);

        $pathToFile = public_path("pdf/" .$themedia->file_name);
        return response()->file($pathToFile);
//        $themedia = Media::find($media);
//
//        return view('media.show',  ['pdf' => $themedia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy($media)
    {
        $themedia = Media::find($media);

        $pathToFile = public_path("pdf/" .$themedia->file_name);
        Media::destroy($media);
        File::delete($pathToFile);
        return redirect('/media');
    }
}
