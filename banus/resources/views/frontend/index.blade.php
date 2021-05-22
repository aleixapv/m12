@extends('layouts.frontEndLayout')
@section('content')
  <br class="d-block d-lg-none">
  <br class="d-block d-lg-none">

  <div class="" id="containerprojecte">
    @include('frontend/carousel')
    <div class="row d-flex justify-content-center" id="card_index"  style="display: none;" >
      @forelse ($serveis as $servei)
        @include('frontend/servei')
      @empty
      @endforelse
    </div>
    @if(isset($projectesObj))
      
    @endif
  </div>
  
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
  <link rel="stylesheet" href="{{url('css/projectes.css')}}">
  <script src="{{url('js/projectesfrontend.js')}}"></script>
  
  
@endsection