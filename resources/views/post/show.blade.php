@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
        <a  class="btn btn-success" href="{{ route('post.index')}}">
            Revenir

        </a>
            <div class=" row">

                <div class="col-sm-10">
                    <h2 >{!! $post->title !!}<h2>
                </div>
            </div>
            <div class=" row">
                <div class="col-sm-10">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        @if($post->file_name !==null)

        <div class=" row">
            <div class="col-sm-10">
                <img src="{{ URL::to('/') }}/img/{{$post->file_name}} ">
            </div>
        </div>
        @endif


    </div>
@endsection