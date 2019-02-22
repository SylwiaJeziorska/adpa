@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
            <div class="panel-body">

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
                    <form class="form-horizontal" method="POST" action="{{ route('addUsers') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Matricule</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required="">

                                @if ($errors->has('username'))

                                    {{ $errors->first('username') }}

                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Date de naissance</label>

                        <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirmer date de naissance</label>

                        <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
