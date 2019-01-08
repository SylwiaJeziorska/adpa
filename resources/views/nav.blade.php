<div class="row">
    <div class="col-md-2 col-md-offset-1 logo" id="logo">
        <img  height="100px"src="{{ URL::to('/') }}/img/logo.png">

    </div>

</div>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
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
            <li class="dropdown">
                <a style="color:white; margin: 0" class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Admin  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a  class="navbar-brand" href="{{ route('post.index')}}">
                            Article
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

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse" >
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href={{ url('page/6') }}> Le comité</a></li>
                <li><a href={{ url('page/17') }}> Prestations </a></li>
                <li><a href={{ url('page/6') }}> Billeterie </a></li>
                <li><a href={{ url('page/6') }}> Réductions </a></li>
                <li><a href={{ url('page/6') }}> Les dates clés </a></li>
                <li><a href={{ url('page/6') }}> Contact </a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown" style="background: #847F80;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a style="color:#847F80;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
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
