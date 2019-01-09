
@include('head')
@if(Auth::user()->email!==null)
    @include('nav')
    @endif
<div class="container changePsw">
    <div class="row">
        <div class="col-md-6 col-md-offset-4 logo" id="logo">
            <img  height="100px"src="{{ URL::to('/') }}/img/logo1.svg">
            <h2>ADPA Comité d’entreprise</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">

                <div class="panel-heading" id="loginHeader">
                    @if(Auth::user()->email==null)
                    <p>Veuillez choisir un nouveau mot de passe et compléter votre compte </p>


                    @endif
                    <h1>Mon compte</h1><br/>
                </div>
                <div class="panel-body">
                    <p>{{Auth::user()->username}}</p>

                @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{--<label for="name" class="col-md-4 control-label">Nom</label>--}}

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Nom *" name="name" value="{{  Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" placeholder="Prénom *" name="prenom" value="{{  Auth::user()->prenom }}" autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">E-Mail </label>--}}

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-Mail *" class="form-control" name="email" value="{{  Auth::user()->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            {{--<label for="new-password" class="col-md-4 control-label">Mot de passe actuel</label>--}}

                            <div class="col-md-12">
                                <input id="current-password" type="password" placeholder="Mot de passe actuel" class="form-control" name="current-password">

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            {{--<label for="new-password" class="col-md-4 control-label">Nouveau mot de passe</label>--}}

                            <div class="col-md-12">
                                <input id="new-password" placeholder="Nouveau mot de passe *" type="password" class="form-control" name="newPassword" >

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{--<label for="new-password-confirm" class="col-md-4 control-label">Confirmer le nouveau mot de passe</label>--}}

                            <div class="col-md-12">
                                <input id="new-password-confirm" type="password" class="form-control" placeholder="Confirmer le nouveau mot de passe *" name="new-password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">E-Mail </label>--}}

                            <div class="col-md-12">
                                <input id="address" type="text" placeholder="Adresse" class="form-control" name="address " value="{{ old('address') }}" >

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">E-Mail </label>--}}

                            <div class="col-md-12">
                                <input id="phone" type="text" placeholder="Tel" class="form-control" name="phone " value="{{ old('phone') }}" >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-7">
                                <button type="submit" class="btn btn-default">
                                    S’enregister
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>