@extends('layouts.app')
@section('content')
    <script>
        tinyMCE.init({
            selector: '#mytextarea',
            plugins: "link, advlist",
            advlist_bullet_styles: "square"
        })
    </script>
    <div class="container">
        <form method="POST" action="{{route('page.update', $page->id)}}" >

            <div class="form-group row">
                {{ method_field('PUT') }}
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$page->title}}" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
                <div class="col-sm-10">
                    <textarea id="mytextarea" name="content" rows="8" cols="80">{{$page->content}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary" value="Save"/>

            </div>
        </form>
        <a  class="btn btn-success" href="{{ route('page.index')}}">
            Retourner
        </a>
    </div>
@endsection