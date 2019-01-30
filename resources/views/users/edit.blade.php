@extends('layouts.app')
@section('content')
    <script>
        tinyMCE.init({
            selector: '#mytextarea',
            plugins: "link, advlist",
            advlist_bullet_styles: "square"
        })
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                <div  class="panel-body">

                    <div class="panel panel-default" style="margin: 0">
                        <ul class="list-group">
                            <li class="list-group-item "><a  href="{{route('usersList')}}" >Revenir</a>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <form method="POST" class="form-horizontal"action="{{route('userUpdate', $user)}}" >

            <div class="form-group row">
                {{ method_field('PUT') }}
                {{csrf_field()}}

                <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Nom</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control form-control-lg" id="lgFormGroupInput" value="{{$user->name}}" placeholder="nom" >
                </div>
            </div>
            <div class="form-group row">
                <label for="Prenome" class="col-sm-2 col-form-label col-form-label-lg">Prenome</label>
                <div class="col-md-6">
                    <input   class="form-control form-control-lg"  name="prenome"  value="{{$user->prenome}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label col-form-label-lg">E-mail</label>
                <div class="col-md-6">
                    <input  class="form-control form-control-lg"  name="email" value="{{$user->email}}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary" value="Save"/>

            </div>
        </form>
            </div>
@endsection