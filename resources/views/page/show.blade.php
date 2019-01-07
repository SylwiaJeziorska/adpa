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

                <div class="col-sm-10">
                    {!! $page->content !!}
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