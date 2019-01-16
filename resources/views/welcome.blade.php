@include('head')

<div class="container" id="login-blade" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4 logo" id="logo">
            <img  height="100px"src="{{ URL::to('/') }}/img/logo1.svg">
            <h2>ADPA Comité d’entreprise</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default login">
            <div class="panel-heading" >
               <p class="first">Entrez l'identifiant et le mot de passe qui vous ont été fournis par le CE ADPA38</p>
            </div>
                <div class="panel-body" id="loginForm">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} formPadding" >
                            <label class='first'for="email" >Identifiant</label><br/>

                            <label for="email" class="standard">E-mail</label><br/>

                            <div >
                                <input style="width: 100%" type="text"  name="email"  value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} formPadding " >
                            <label for="password" >Mot de passe</label>

                            <div >
                                <input style="width: 100%" id="password" type="password"  name="password"reqired >

                                @if ($errors->has('password'))
                                    <span class="help-block">                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group formPadding lastGroup"  >
                            <div >
                                <div class="checkbox ">
                                    <label class="standard">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                    </label>
                                    <button style="float: right" type="submit" class="btn btn-warning">
                                        Se connecter
                                    </button>
                                </div>

                            </div>
                        </div>

                        <div class="form-group" id="formFooter">
                            <div >


                                <a class="btn btn-link standard" href="{{ route('password.request') }}">Mot de passe oublié ?</a><br/>
                                <a class="btn btn-link" id="btnFirstTime">Première connexion</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $('.first').css('display','none');
        $( "#btnFirstTime" ).click(function() {
           $('.first').css('display','inline');
           $('.standard').hide();

        });
    });

</script>
