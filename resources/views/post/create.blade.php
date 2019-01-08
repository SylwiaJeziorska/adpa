@extends('layouts.app')
@section('content')
    <script>
        tinyMCE.init({
            selector: 'textarea',
            plugins: "link, advlist",
            advlist_bullet_styles: "square"
        })
    </script>
    <div class="container">
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