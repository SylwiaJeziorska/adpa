@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
            <div class=" row">

                <div class="col-sm-10">
                    <h2 >{{$post->title}}<h2>
                </div>
            </div>
            <div class=" row">
                <div class="col-sm-10">
                    <p>{{$post->content}}</p>
                </div>
            </div>

        <a  class="btn btn-success" href=" {{route('post.edit', $post)}}">
            Modifier
        </a>
        <a  class="btn btn-success" href="{{ route('post.index')}}">
            Retourner
        </a>
    </div>
@endsection