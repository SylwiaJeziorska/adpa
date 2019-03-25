@extends('layouts.app')
@section('content')
<div class="container">

            <div  class="jumbotron">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <p>Voulez-vous vraiment vous désabonner ?</p>
                        <div class="row">
                            <form onsubmit="return confirm('Voulez-vous vraiment vous désabonner ?')"
                                  action="{{route('userDestroy', Auth::id())}}"
                                  method="post"
                                  style="display: inline">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger cursor-pointer  btn-lg">
                                    Je veux me désinscrire
                                    <!-- <i class="text-danger fa fa-remove"></i> -->
                                </button>
                            </form>
                            <a href='{{ url('post') }}' class="btn btn-info cursor-pointer  btn-lg"> no</a>
                        </div>

                    </div>
                    </div>

                </div>




</div>
@endsection