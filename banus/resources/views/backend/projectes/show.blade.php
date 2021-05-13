@extends('layouts.backEndLayout')
@section('content')

@include('frontend/projecte')
@include('frontend/modalProjecte')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
<link rel="stylesheet" href="{{url('css/projectes.css')}}">
<script src="{{url('js/src/jquery.min.js')}}"></script>
<script src="{{url('js/sortable.js')}}"></script>
<script src="{{url('js/informacio.js')}}"></script>
<script src="{{url('js/projectesfrontend.js')}}"></script>
<script src="{{url('js/projectes.js')}}"></script>
@endsection