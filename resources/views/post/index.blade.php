@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="pageTitle col-sm-12">
            <h1>Actualites</h1>

        </div>
        <div class="col-md-7">
          <table class=" ">

              <tbody>
              @foreach($posts as $post)
                  <tr>
                      <!-- <td>
                          <nobr>{{($post['created_at']->format('d-m-Y '))}}</nobr>
                      </td> -->
                      @if(strlen($post['content']) > 600)
                      <td>{!! str_limit($post['content'], 600,'...')!!}
                        <a class="" href="{{route('post.show',$post['id'])}}">lire la suite</a></td>
                        @else
                        <td><h2>{{$post['title']}}</h2> {!! str_limit($post['content'], 600,'...')!!}
                        </td>
                        @endif

                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <div class="pdfWrapper row" >
              @foreach($medias as $media)
                  <div class="pdf col-md-5" >
                      <a target="_blank"href="{{route('media.show',$media['id'])}}">
                          <img height="50px" src="{{ URL::to('/') }}/img/pdf.png">
                      </a>
                      <!-- <p>{{$media['created_at']->toDateString()}}</p> -->
                      <p>{{$media['title']}}</p>

                  </div>



              @endforeach
          </div>
        </div>

                </div>
            </div>
@endsection
