@extends('layouts.frontEndLayout')
@section('content')
<br class="d-block d-lg-none">
<br class="d-block d-lg-none">

<div class="" id="containerprojecte">
  @include('frontend/carousel')
  <br>
  <div class="row" id="card_index" style="display: none;">
    @forelse ($serveis as $servei)
      @include('frontend/servei')
    @empty
        
    @endforelse
    
  </div>
  <br>
  <div class="container">
  <br>
</div>
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection