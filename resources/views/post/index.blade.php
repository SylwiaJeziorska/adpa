@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class='alert alert-success'>
                {{ session('message') }}
            </div>
        @endif
        <a  href="{{route('post.create')}}" class="btn btn-warning">Ajouter un actualité</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>

                <th>Contenu</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{($post['created_at'])}}</td>
                    <td>{{$post['title']}}</td>
                    <td>{!! str_limit($post['content'], 200,'...')!!}</td>

                    <td><a class="btn btn-default btn-sm" href="{{route('post.show',$post['id'])}}">Aperçu</a></td>

                    <td>   <a  class="btn btn-default btn-sm" href=" {{route('post.edit', $post)}}">
                            Modifier
                        </a>
                    </td>
                    <td>

                    </td>
                    <td>
                        <form method="post" action="{{route('send', $post['id'])}}">
                            {{csrf_field()}}

                            <input type="submit" class="btn btn-default btn-sm">

                        </form>
                    </td>
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