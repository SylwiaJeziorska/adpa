@extends('layouts.app')
@section('content')
<tr>
    <td>{{$post->title}}</td>
    <td>{{$post->content}}</td>
</tr>
@endsection