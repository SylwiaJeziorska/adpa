@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row contact">
            @if(session('message'))
                <div class='alert alert-success'>
                    {{ session('message') }}
                </div>
            @endif

            <form class="form-horizontal col-md-6 col-md-offset-2 " method="POST" action="{{('/contact') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <div class="col-md-11 col-md-offset-1">
                        <input id="name" type="text" class="form-control" placeholder="Nom" name="name"
                               value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-md-11 col-md-offset-1">
                        <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}"
                               required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('object') ? ' has-error' : '' }}">

                    <div class="col-md-11 col-md-offset-1">
                        <input id="email" type="object" placeholder="Objet" class="form-control" name="subject"
                               value="{{ old('object') }}" required>

                        @if ($errors->has('object'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('object') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('object') ? ' has-error' : '' }}">

                    <div class="col-md-11 col-md-offset-1">
                        <textarea id="message" type="object" rows="7" placeholder="message" class="form-control" name="message"
                                  value="{{ old('message') }}" required></textarea>

                        @if ($errors->has('message'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-11 col-md-offset-1">
                        <button style="background: #C2CBAD;border-color: #C2CBAD;" type="submit" class="btn btn-primary btn-block">
                            ENVOYER
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-md-2">

                <p>
                    ADPA 38<br/>
                    34 avenue de l’Europe, <br/>le Trident Bat A,
                    <br/>38100 Grenoble<br/>
                    04 76 22 82 84,<br/>
                    Les lundis et mercredis de 14h-17h<br/>
                    <span style="color: #E3799F">comite@adpa38.fr</span>
                </p>
            </div>
        </div>
    </div>
@endsection

