@extends('layouts.app')
@section('content')
    <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{url('media')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" placeholder="Titre" name="title">

            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <br/>
            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
@endsection