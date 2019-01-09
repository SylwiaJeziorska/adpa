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
        {{--<a class="btn btn-success" href="{{ route('post.index')}}">--}}
            {{--Retourner--}}
        {{--</a>--}}
        <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">

            <div class="form-group row">
                {{ method_field('PUT') }}
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control form-control-lg" id="lgFormGroupInput"
                           value="{{$post->title}}" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
                <div class="col-sm-10">
                    <textarea id="mytextarea" name="content" rows="8" cols="80">{{$post->content}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                @if($post->file_name !==null)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label col-form-label-sm" for="image">Add image</label><br/>
                        <input name="image" type="file"><br/>

                    </div>
                    <div class="form-group row">


                        <label class="col-sm-2 col-form-label col-form-label-sm" for="image">Image</label>

                        <img width="150px" src="{{ URL::to('/') }}/img/{{$post->file_name }}" alt="">
                        <p class="row col-sm-2 col-form-label col-form-label-sm"
                           id="type_chantier">{{$post->original_name}}</p>

                        <label class="form-check-input" for="delete">Suprimer</label>

                        <input type="checkbox" class="form-check-label" name="delete" value="{{1}}">



                    </div>
                @endif

            </div>


            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary" value="Save"/>

            </div>
        </form>


    </div>
@endsection