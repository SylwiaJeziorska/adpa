@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div  class="panel-body">

                <div class="panel panel-default" style="margin: 0">
                    <ul class="list-group">
                        <li class="list-group-item "><a  href="{{route('page.create')}}" >Ajouter un page</a>
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
                <div class="col-md-8 col-md-offset-1 " >
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
                                <td><nobr>{{($post['created_at']->format('d-m-Y '))}}</nobr></td>

                                <td>{!! $post['title']!!}</td>
                                <td>{!! str_limit($post['content'], 200,'...')!!}</td>


                                <td><a class="btn btn-default btn-sm" href="{{route('page.show',$post['id'])}}">Aperçu</a></td>

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

        </div>

    </div>
@endsection