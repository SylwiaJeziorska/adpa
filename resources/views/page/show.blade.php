@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">
            {{--<div class=" row">--}}

                {{--<div class="col-sm-10">--}}
                    {{--{{$page->title}}--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class=" row">

                <div class="col-sm-6">
                    {!! $page->content !!}
                </div>
                <div class="col-sm-4 col-sm-offset-2 row">
                    @isset($post)
                    {!! $post->title !!}
                    <img class="col-sm-12 "  src="{{ URL::to('/') }}/img/{{$post->file_name}} ">
                    {!! $post->content !!}
                    @endisset
                    @isset($medias)

                            @foreach($medias as $media)
                                <h2>Les Pv</h2>

                                    <a  href="{{route('media.show',$media['id'])}}">
                                        <img height="100px"src="{{ URL::to('/') }}/img/pdf.png">
                                        </a>
                                {{$media['created_at']->toDateString()}}


                            @endforeach
                        @endisset
                </div>

            </div>


        <a  class="btn btn-success" href=" {{route('page.edit', $page)}}">
            Modifier
        </a>
        <a  class="btn btn-success" href="{{ route('page.index')}}">
            Retourner
        </a>
    </div>
@endsection