@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="pageTitle col-sm-12">
            <h1>Actualites</h1>

        </div>
        <div class="col-md-7">
          <table class="table  table-striped">
              <thead>

              </thead>
              <tbody>
              @foreach($posts as $post)
                  <tr>
                      <td>
                          <nobr>{{($post['created_at']->format('d-m-Y '))}}</nobr>
                      </td>
                      <td>{{$post['title']}}</td>
                      <td>{!! str_limit($post['content'], 200,'...')!!}<a class="" href="{{route('post.show',$post['id'])}}">lire la suite</a></td>
                      <td></td>

                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <h2>Pdf</h2>
          <div class="pdfWrapper">
              @foreach($medias as $media)
                  <div class="pdf" style="margin:20px;">
                      <a target="_blank"href="{{route('media.show',$media['id'])}}">
                          <img height="50px" src="{{ URL::to('/') }}/img/pdf.png">
                      </a>
                      <p>{{$media['created_at']->toDateString()}}</p>
                      <p>{{$media['title']}}</p>

                  </div>



              @endforeach
          </div>
        </div>

                </div>
            </div>
@endsection
