@extends('layouts.app')
@section('content')
    {{--{{dd($post->title)}}--}}

    <div class="container">

      @if($page->modelId==null || $page->modelId==0 )
<div class="pageTitle col-sm-10 col-sm-offset-1">
  <h1>{!! $page->title !!} ++</h1>

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

                    <h2>PDF</h2>
                    <div class="pdfWrapper">
                        @foreach($medias as $media)
                            <div class="pdf" style="margin:20px;">
                                <a target="_blank"href="{{route('media.show',$media['id'])}}">
                                    <img height="50px" src="{{ URL::to('/') }}/img/pdf.png">
                                </a>
                                <p>{{$media['published_at']}}</p>
                                <p>{{$media['title']}}</p>

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
