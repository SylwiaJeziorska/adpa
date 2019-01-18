@extends('layouts.app')
@section('content')

    <script>
        tinyMCE.init({
            selector: 'textarea',
            plugins: "link, lists advlist",
            advlist_bullet_styles: "square",
            language: 'fr_FR',
            language_url: 'https://www.comite-adpa.fr/file/langs/fr_FR.js',
            toolbar: [
                'bold italic underline removeformat | strikethrough superscript subscript | fontsizeselect | backcolor | bullist numlist | styleselect | lineheightselect',
                'link image media table hr | fullscreen undo redo print restoredraft'
            ]
        })
    </script>
    <div class="container">
        <a  style="margin-bottom: 20px" class="btn btn-success" href="{{ route('post.index')}}">
            Retourner
        </a>
        <form method="post"  action="{{url('post')}}" enctype="multipart/form-data">
            <div class="form-group row">
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Titre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " id="title" placeholder="titre" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label col-form-label-sm">Text</label>
                <div class="col-sm-10">
                    <textarea   name="content" rows="8" cols="80"></textarea>
                </div>
            </div>


                <div class="form-group row">
                <input type="submit" value="Créer"class="btn btn-primary" >
            </div>
            </div>
        </form>
    </div>
@endsection