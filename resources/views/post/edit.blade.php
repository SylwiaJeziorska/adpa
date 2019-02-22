@extends('layouts.app')
@section('content')
    <script>
    tinyMCE.init({
        plugins: "link, lists advlist,code",
        selector: "textarea",  // change this value according to your HTML
        menubar: "tools",
        advlist_bullet_styles: "square",
        language: 'fr_FR',
        language_url: 'https://www.comite-adpa.fr/file/langs/fr_FR.js',
        toolbar: [
            'bold italic underline removeformat | strikethrough superscript subscript | fontsizeselect | backcolor | bullist numlist | styleselect | lineheightselect',
            'link image media table hr | fullscreen undo redo print restoredraft'
        ],
    })
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div class="panel-body">

                    <div class="panel panel-default" style="margin: 0">
                        <ul class="list-group">
                            <li class="list-group-item "><a href="{{ route('post.index')}}">
                                    Revenir

                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 " style="padding: 0">
                <div class="panel panel-default">

                    @include('dashboard')
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1 ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                        @if($post->file_name ==null)
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="image">Add
                                    image</label><br/>
                                <input name="image" type="file"><br/>

                            </div>
                              @endif
                            <div class="form-group row">


                                <label class="col-sm-2 col-form-label col-form-label-sm" for="image">Image</label>

                                <img width="150px" src="{{ URL::to('/') }}/img/{{$post->file_name }}" alt="">
                                <p class="row col-sm-2 col-form-label col-form-label-sm"
                                   id="type_chantier">{{$post->original_name}}</p>

                                <label class="form-check-input" for="delete">Suprimer</label>

                                <input type="checkbox" class="form-check-label" name="delete" value="{{1}}">


                            </div>


                    </div>


                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <input type="submit" class="btn btn-primary" value="Save"/>

                    </div>
                </form>
            </div>

        </div>
@endsection
