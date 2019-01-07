@extends('layouts.app')
@section('content')
    <div class="container">
        <a  href="{{route('post.create')}}" class="btn btn-warning">Ajouter des nouvelles</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Sous-titre</th>

                <th>Contenu</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post['title']}}</td>
                    <td></td>
                    <td>{!! $post['content']!!}</td>

                    <td><a class="btn btn-success btn-sm" href="{{route('post.show',$post['id'])}}">Voir plus</a></td>
                    <td><form method="post" action="{{route('send', $post['id'])}}">
                            {{csrf_field()}}

                            <input type="submit" class="btn btn-primary btn-sm">

                        </form></td>
                    <td>

                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                              action="{{route('post.destroy',$post['id'])}}"
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