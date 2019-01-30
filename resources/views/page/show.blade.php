@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
        {{--<div class=" row">--}}

        {{--<div class="col-sm-10">--}}
        {{--{{$page->title}}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<a  style="margin-bottom: 20px" class="btn btn-success" href="{{ route('page.index')}}">--}}
            {{--Revenir--}}
        {{--</a>--}}
        {{--<div class=" row">--}}

                {{--<div class="col-md-2 " style="padding: 0;background-color: #847F80;">--}}
                    {{--<div  class="panel-body">--}}

                        {{--<div class="panel panel-default" style="margin: 0">--}}
                            {{--<ul class="list-group">--}}
                                {{--<li class="list-group-item ">    <a   href="{{ route('page.index')}}">--}}
                                        {{--Retourner--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-2 " style="padding: 0">--}}
                    {{--<div class="panel panel-default">--}}

                        {{--@include('dashboard')--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-8 col-md-offset-1 " >--}}
            <div class="pageTitle">
                <h1>{!! $page->title !!}</h1>

            </div>

            <div class="col-sm-6">
                {!! $page->content !!}
            </div>
            <div class="col-sm-5 col-sm-offset-1 row">
                @isset($posts)

                            @foreach($posts as $post)
                        <div class="lastNews " >
                            <h3>
                            {!! $post->title !!}

                        </h3>
                        @if($post->file_name)
                        <img class="col-sm-12 " src="{{ URL::to('/') }}/img/{{$post->file_name}} ">
                                <hr/>

                            @endif
                        <p>
                            {!! $post->content !!}

                        </p>
                            <hr>
                    </div>
                    @endforeach

                @endisset
                @isset($medias)

                    <h2>Les Pv</h2>
                    <div class="pdfWrapper">
                        @foreach($medias as $media)
                            <div class="pdf">
                                <a href="{{route('media.show',$media['id'])}}">
                                    <img height="50px" src="{{ URL::to('/') }}/img/pdf.png">
                                </a>
                                {{$media['created_at']->toDateString()}}
                            </div>



                        @endforeach
                    </div>

                @endisset
            </div>

        </div>


        {{--<a  class="btn btn-default" href=" {{route('page.edit', $page)}}">--}}
        {{--Modifier--}}
        {{--</a>--}}
        {{--<a  class="btn btn-success" href="{{ route('page.index')}}">--}}
        {{--Retourner--}}
        {{--</a>--}}
            </div>
    </div>
@endsection