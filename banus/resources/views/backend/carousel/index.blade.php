@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('carousel.edit')}}" class="btn btn-success mb-2">Editar</a>
    @include('frontend/carousel')
    @if (count($carousel)==0)
        <div class="alert alert-warning " role="alert">
            Sense diapositives.
        </div>
    @endif
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection