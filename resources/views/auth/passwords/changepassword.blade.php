
@include('head')
@if(Auth::user()->email!==null)
    @include('nav')
    @endif
<div class="container changePsw">

    <div class="row">
        <div class="col-md-6 col-md-offset-4 logo" id="logo">
            <img  height="100px"src="{{ URL::to('/') }}/img/logo1.png">
            <h2>ADPA Comité d’entreprise</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">



                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>

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
                    <form autocomplete="on" class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{--<label for="name" class="col-md-4 control-label">Nom</label>--}}

                            <div class="col-md-6">
                                <label for="name" class="standard">Nom</label><br/>

                                <input id="name" type="text" class="form-control" placeholder="Nom *" name="name" value="<?php if ( Auth::user()->name) {echo Auth::user()->name ;}else{echo  old('name') ;}?>"required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="standard">Prénom</label><br/>

                                <input id="prenom" type="text" class="form-control" placeholder="Prénom " name="prenom" value="<?php if(Auth::user()->prenom){echo Auth::user()->prenom;}else{echo old('prenom');}?>" autofocus>

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
                                <label for="email" class="standard">E-Mail</label><br/>

                                <input id="email" type="email" placeholder="E-Mail *" class="form-control" name="email" value="<?php if (Auth::user()->email) {echo Auth::user()->email ;}else{echo  old('email') ;} ?>" required>

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
                                <label  class="standard">Mot de passe actuel</label><br/>

                                <input id="current-password" type="password" placeholder="Mot de passe actuel" class="form-control" name="current-password">

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            {{--<label for="new-password" class="col-md-4 control-label">Nouveau mot de passe </label>--}}

                            <div class="col-md-12">
                                <input id="new-password" placeholder="Nouveau mot de passe *" type="password" class="form-control" name="new-password" >

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
                                <label  class="standard">Adresse</label><br/>

                                <input style="margin-bottom: 10px;" id="address" type="text" placeholder="Adresse" class="form-control" name="address" value="<?php if ( Auth::user()->address) {echo Auth::user()->address ;}else{echo  old('address') ;} ?>" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="cp" type="text" placeholder="Code postal" class="form-control" name="cp" value="<?php if ( Auth::user()->cp) {echo Auth::user()->cp ;}else{echo  old('cp') ;} ?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <input id="city" type="text" placeholder="Ville" class="form-control" name="city"  value="<?php if ( Auth::user()->city) {echo Auth::user()->city ;}else{echo  old('city') ;} ?>" >
                                    </div>
                                </div>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <label  for="phone"class="standard">Tel</label><br/>

                                <input id="tel" type="text" placeholder="Tel" class="form-control" name="tel"  value="<?php if ( Auth::user()->tel) {echo Auth::user()->tel ;}else{echo  old('tel') ;} ?>" >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(Auth::user()->email==null)
                            <label class="standard">
                                <input type="checkbox" name="RGPD" > En cochant cette case j'accepte enregistration les données ...</label>

                        @endif


                        <div class="form-group">
                            <div class="col-md-12 ">
                                @if(Auth::user()->email==null)
                                    <a class="btn btn-default" style="color:#847F80;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                        Recommencer
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-default">
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
<script>

</script>
