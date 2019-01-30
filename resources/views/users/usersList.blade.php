@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div  class="panel-body">

                    <div class="panel panel-default" style="margin: 0">

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
                        <th>Nom</th>

                        <th>Prénom</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><nobr>{{($user['created_at']->format('d-m-Y '))}}</nobr></td>

                            <td>{!! $user['name']!!}</td>
                            <td>{!! $user['prenome']!!}</td>
                            <td>{!! $user['email']!!}</td>


                            <td><a class="btn btn-default btn-sm" href="{{route('userEdit',$user)}}">Modifier</a></td>

                            <td>

                                {{--<form onsubmit="return confirm('Are you sure you want to delete?')"--}}
                                      {{--action="{{route('userDestroy',$user['id'])}}"--}}
                                      {{--method="post"--}}
                                      {{--style="display: inline">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--{{method_field('DELETE')}}--}}
                                    {{--<button type="submit" class="btn btn-danger cursor-pointer  btn-sm">--}}
                                        {{--Supprimer--}}
                                        {{--<!-- <i class="text-danger fa fa-remove"></i> -->--}}
                                    {{--</button>--}}
                                {{--</form>--}}


                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection