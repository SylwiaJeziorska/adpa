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
              <div  class="panel-body">

              <div class="panel panel-default" style="margin: 0">
                  <ul class="list-group">
                      <!-- <li class="list-group-item "><a  href="{{route('page.create')}}" >Ajouter un page</a>
                      </li> -->
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
              <div class="col-md-8 col-md-offset-1 " >
        <!-- <a  style="margin-bottom: 20px" class="btn btn-success" href="{{ route('page.index')}}">
            Revenir
        </a> -->
        <form method="POST" action="{{route('page.update', $page->id)}}" >
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                {{ method_field('PUT') }}
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Titre</label>
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
                <div class="form-group row">


                    <p class="col-sm-2 col-form-label col-form-label-sm" >Modéle</p>

                    <div class="col-sm-10">
                        <input type="radio" name="model" value="0" <?php echo($page->modelId == 0 ? "checked='checked'" : ""); ?>>
                        <label for="huey" style="margin-right: 20px;" >Aucun</label>
                        <input type="radio" name="model" value="1" <?php echo($page->modelId == 1? "checked='checked'" : ""); ?>>
                        <label for="dewey" style="margin-right: 20px;">Flash info</label>
                        <input type="radio"  name="model" value="2"  <?php echo($page->modelId == 2 ? "checked='checked'" : ""); ?>>
                        <label for="louie" style="margin-right: 20px;">Pdf</label>
                    </div>


                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary" value="Enregistrer"/>

            </div>
        </form>
        <!-- <a  class="btn btn-success" href="{{ route('page.index')}}">
            Retourner
        </a> -->
    </div>
@endsection
