@extends('layouts.frontEndLayout')
@section('content')
<br class="d-block d-lg-none">
<br class="d-block d-lg-none">

<div class="" id="containerprojecte">
  @include('frontend/carousel')
  <br>
  <div class="row d-flex justify-content-center" id="card_index"  style="display: none;" >
    @forelse ($serveis as $servei)
      @include('frontend/servei')
    @empty
        
    @endforelse
    
  </div>
  <br>
  @if(isset($projectes))
    <div class="work">
      <div id="grid"" class="grid">
        @forelse ($projectes as $projecte)
          @include('frontend/projecte')
          <br>
          @php
            $contador ++;
          @endphp
        @empty
            
        @endforelse
  
        <a class="card" href="#" data-groups="" hidden>
          <img src="" />
          <div class="title">Project Title</div>
        </a>
        
        <div class="guide"></div>
      </div>

    </div>
    @php
      $contador = 1;
    @endphp
    @forelse ($projectes as $projecte)
      @include('frontend/modalProjecte')
      @php
        $contador ++;
      @endphp
    @empty
      
    @endforelse
  @endif
  <br>
</div>
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection