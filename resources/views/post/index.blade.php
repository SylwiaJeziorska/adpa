@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-md-7">
          <table class="table  table-striped">
              <thead>
              <tr>
                  <th>Date</th>
                  <th>Titre</th>

                  <th>Contenu</th>


              </tr>
              </thead>
              <tbody>
              @foreach($posts as $post)
                  <tr>
                      <td>
                          <nobr>{{($post['created_at']->format('d-m-Y '))}}</nobr>
                      </td>
                      <td>{{$post['title']}}</td>
                      <td>{!! str_limit($post['content'], 200,'...')!!}</td>
                      <td><a class="btn btn-default btn-sm"
                             href="{{route('post.show',$post['id'])}}">Aperçu</a></td>

                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <h2>Les Pv</h2>
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
