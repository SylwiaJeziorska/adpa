@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
        <form method="post" action="{{route('send', $post->id)}}" >
            <div class="form-group row">
                {{csrf_field()}}

                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$post->title}}" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
                <div class="col-sm-10">
                    <textarea name="post" rows="8" cols="80">{{$post->content}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input class="btn btn-warning" value="Modifier" type="submit" class="btn btn-primary">
            </div>
        </form>
        <a  class="btn btn-success" href="{{ route('post.index')}}">
            Retourner
        </a>
    </div>
@endsection