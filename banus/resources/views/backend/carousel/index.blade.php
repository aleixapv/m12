@extends('layouts.backEndLayout')
@section('content')
    <a href="{{route('carousel.edit')}}">Editar</a>
    @include('frontend/carousel')
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection