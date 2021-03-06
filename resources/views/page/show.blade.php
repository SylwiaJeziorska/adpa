@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">

      @if($page->modelId==null || $page->modelId==0 )
<div class="pageTitle col-sm-10 col-sm-offset-1">
  <h1>{!! $page->title !!}</h1>

</div>
<div class="col-sm-10 col-sm-offset-1">

  @elseif($page->modelId==1 || $page->modelId==2)
      <div class="pageTitle col-sm-12">
          <h1>{!! $page->title !!}</h1>

      </div>
      <div class="col-sm-6">
          @endif
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


                        @foreach($medias as $media)
                          @isset($media)
                          <div class="pdfWrapper col-md-12">
                            <div class="pdf col-md-12" >
                                <a  class="col-md-2" target="_blank"href="{{route('media.show',$media['id'])}}">
                                    <img height="50px" src="{{ URL::to('/') }}/img/pdf.png">
                                </a>
                                <p class="col-md-10">{{$media['title']}}</p>

                            </div>

                            </div>
                            @endisset
                        @endforeach


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
