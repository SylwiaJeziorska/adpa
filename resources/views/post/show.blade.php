@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
        <div class="container">
            @if(Auth::user()->role )
            <div class="row">
                <div class="col-md-2 " style="padding: 0;background-color: #847F80;">
                    <div class="panel-body">

                        <div class="panel panel-default" style="margin: 0">
                            <ul class="list-group">
                                <li class="list-group-item ">    <a  href="{{ route('post.index')}}">
                                        Revenir

                                    </a>

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
                @endif
                <div class="col-md-8 col-md-offset-1 ">

                    <div class=" row">

                        <div class="col-sm-10">
                            <h2>{!! $post->title !!}<h2>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-10">
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                    @if($post->file_name !==null)

                        <div class=" row">
                            <div class="col-sm-10">
                                <img src="{{ URL::to('/') }}/img/{{$post->file_name}} ">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
@endsection