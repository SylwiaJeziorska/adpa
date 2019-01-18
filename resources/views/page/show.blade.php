@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
        {{--<div class=" row">--}}

        {{--<div class="col-sm-10">--}}
        {{--{{$page->title}}--}}
        {{--</div>--}}
        {{--</div>--}}
        <a  style="margin-bottom: 20px" class="btn btn-success" href="{{ route('page.index')}}">
            Retourner
        </a>
        <div class=" row">
            <div class="pageTitle">
                <h1>{!! $page->title !!}</h1>

            </div>

            <div class="col-sm-6">
                {!! $page->content !!}
            </div>
            <div class="col-sm-5 col-sm-offset-1 row">
                @isset($post)
                    <div class="lastNews">
                        <h3>
                            {!! $post->title !!}

                        </h3>
                        @if($post->file_name)
                        <img class="col-sm-12 " src="{{ URL::to('/') }}/img/{{$post->file_name}} ">
                        @endif
                        <p>
                            {!! $post->content !!}

                        </p>
                    </div>

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
@endsection