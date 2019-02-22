@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;">
                <div class="panel panel-default">

                    @include('dashboard')
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenue sur l'espace admin</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Vous êtes connecté en tant que  {{ Auth::user()->name }}</p>
                            <p>{{$usersNumber}} utilisateurs ont changé leur mot de passe.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
