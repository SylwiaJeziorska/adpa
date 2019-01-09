@extends('layouts.app')
@section('content')
    <div class="container">
        <a  href="{{route('page.create')}}" class="btn btn-warning">Ajouter un page</a>
        <table class="table ">
            <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>

                <th>Contenu</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $post)
                <tr>
                    <td>{!! $post['created_at']!!}</td>

                    <td>{!! $post['title']!!}</td>
                    <td>{!! str_limit($post['content'], 200,'...')!!}</td>


                    <td><a class="btn btn-default btn-sm" href="{{route('page.show',$post['id'])}}">Voir plus</a></td>

                    <td>

                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                              action="{{route('page.destroy',$post['id'])}}"
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