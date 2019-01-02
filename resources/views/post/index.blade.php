@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['content']}}</td>
                    <td><a href="{{route('post.show',$post['id'])}}">Show</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection