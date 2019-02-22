@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div class="panel-body">

                    <div class="panel panel-default" style="margin: 0">
                        <ul class="list-group">
                            <li class="list-group-item "><a  href="{{route('media.create')}}">Ajouter un nouveau PDF</a>
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
              <h1>Liste des pdf</h1>
                <td></td>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Titre</th>
                        <th>Url</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medias as $media)
                        <tr>
                            <td><nobr>{{($media['created_at']->format('d-m-Y '))}}</nobr></td>
                            <td>{{$media['title']}}</td>
                            <td>{{public_path("img/" .$media['file_name'])}}</td>

                            <td><a target="_blank" class="btn btn-success btn-sm" href="{{route('media.show',$media['id'])}}">Télécharger</a>
                            </td>

                            <td>


                                <form onsubmit="return confirm('Are you sure you want to delete?')"
                                      action="{{route('media.destroy',$media['id'])}}"
                                      method="post"
                                      style="display: inline">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger cursor-pointer  btn-sm">
                                        Supprimer
                                        <!-- <i class="text-danger fa fa-remove"></i> -->
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
