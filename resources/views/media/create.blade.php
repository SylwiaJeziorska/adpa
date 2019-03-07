@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div class="panel-body">

                    <div class="panel panel-default" style="margin: 0">
                        <ul class="list-group">
                            <li class="list-group-item "><a href="{{ route('media.index')}}">
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
                <form action="{{url('media')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre</label>
                        <input type="text" class="form-control" placeholder="Titre" name="title">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Date de publication </label><br/>
                        <input type="date" class="form-control-file" name="published_at">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Page</label><br/>
                        <select id="page_id" name="page_id">
                          <option value="0">----</option>
                            <option value="17">Le comité</option>
                            <option value="18">Prestations</option>
                            <option value="19">Billetterie</option>
                            <option value="20">Réductions</option>
                            <option value="21">Les dates clés</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Télécharger pdf </label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <br/>
                    <button type="submit" class="btn-primary">Submit</button>
                </form>
            </div>
        </div>
@endsection
