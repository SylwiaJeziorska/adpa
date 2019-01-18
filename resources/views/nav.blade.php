<div class=" container navBlade">
    <div class="row">
        <div class=" logo" id="logo">
            <div>
                <img  height="100px"src="{{ URL::to('/') }}/img/logo1.svg">
                {{--<h3> Acompanier à domicile <br/><span>pour préserver l'autonomie</span></h3>--}}

            </div>
            <h2>CE ADPA 38</h2>

        </div>
    </div>



</div>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container " id="navBG">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            {{--<a style="color:white" class="navbar-brand" href="{{ route('post.index')}}">--}}
                {{--Admin--}}
            {{--</a>--}}
            @if(Auth::user()->role)
            <li class="dropdown">
                <a style="color:white; margin: 0" class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Admin  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a  class="navbar-brand" href="{{ route('post.index')}}">
                            Flesh info
                        </a>


                    </li>
                    <li>
                        <a class="navbar-brand" href="{{ route('media.index')}}">
                            PDF
                        </a>


                    </li>
                    <li>
                        <a  class="navbar-brand" href="{{ route('page.index')}}">
                            Page
                        </a>


                    </li>
                </ul>
            </li>
        @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse" >
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href={{ url('page/6') }}> Accueil</a></li>
                <li><a href={{ url('page/17') }}> Le comité</a></li>
                <li><a href={{ url('page/6') }}> Prestations </a></li>
                <li><a href={{ url('page/6') }}> Billeterie </a></li>
                <li><a href={{ url('page/6') }}> Réductions </a></li>
                <li><a href={{ url('page/6') }}> Les dates clés </a></li>
                <li><a href={{ url('contact') }}> Contact </a></li>


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{ route('monCompte') }}">Mon compte</a></li>

                    <li class="dropdown" style="background: #847F80;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a style="color:#847F80;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        $( ".dropdown" ).click(function() {
            $(this).children('.dropdown-menu').toggle();

        });
    });

</script>
