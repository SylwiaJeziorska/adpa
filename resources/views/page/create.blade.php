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
                        <label for="dewey" style="margin-right: 20px;">Flash info</label>
                        <input type="radio" name="modelId" value="2">
                        <label for="louie" style="margin-right: 20px;">Pdf</label>
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