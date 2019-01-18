@extends('layouts.app')
@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey= 0zarq7dq309c4edemkghb5cy56hj5l8ddz4loksx98tfv2w8 "></script>
    <script>

        tinyMCE.init({
            selector: '#mytextarea',
            plugins: "link, advlist",
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
        <a  style="margin-bottom: 20px" class="btn btn-success" href="{{ route('page.index')}}">
            Retourner
        </a>
        <form method="post"  action="{{url('page')}}">
            <div class="form-group row">
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label col-form-label-sm">Contenu</label>
                <div class="col-sm-10">
                    <textarea id="mytextarea" name="content" rows="8" cols="80"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group row">


                    <p class="col-sm-2 col-form-label col-form-label-sm" >Model</p>

                    <div class="col-sm-10">
                        <input type="radio"  name="modelId" value="0"
                               checked>
                        <label for="huey" style="margin-right: 20px;">Aucun</label>
                        <input type="radio"  name="modelId" value="1">
                        <label for="dewey" style="margin-right: 20px;">Avec actualité</label>
                        <input type="radio" name="modelId" value="2">
                        <label for="louie" style="margin-right: 20px;">Avec Pdf</label>
                    </div>


                </div>
            </div>


                <div class="form-group row">
                <input type="submit" value="Créer"class="btn btn-primary" >
            </div>
            </div>
        </form>
    </div>
@endsection