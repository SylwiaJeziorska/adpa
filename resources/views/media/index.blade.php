@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Url</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($medias as $media)
                <tr>
                    <td>{{$media['title']}}</td>
                    <td>{{public_path("img/" .$media['file_name'])}}</td>

                    <td><a class="btn btn-success btn-sm" href="{{route('media.show',$media['id'])}}">Download</a></td>
                    <td><a class="btn btn-success btn-sm" href="{{route('media.edit',$media['id'])}}">Modifier</a></td>

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
@endsection