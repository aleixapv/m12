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
  @php
    $contador = 1;
  @endphp
  <div id="projectes_body">

    <h1 class="section-header text-center" id="ultims_projectes">Últims projectes</h1>
    
    <div class="work">
      <div class="category-buttons d-none d-lg-block" hidden>
        <a href="#" class="active all" data-group="all" hidden>Tot</a>
        
      </div>
    
      <div id="grid"" class="grid ">
        @forelse ($projectesObj as $projecte)
          @include('frontend/projecte')
          <br>
          @php
            $contador ++;
          @endphp
        @empty
            <h1>No hi han projectes en aquest moment</h1>
        @endforelse
  
        <a class="card" href="#"  hidden>
          <img src="" />
          <div class="title">Project Title</div>
        </a>
        
        <div class="guide"></div>
      </div>
    </div>
    @php
      $contador = 1;
    @endphp
    @forelse ($projectesObj as $projecte)
      @include('frontend/modalProjecte')
      @php
        $contador ++;
      @endphp
    @empty
      <h1>No hi han projectes en aquest moment</h1>
    @endforelse
   
  </div>
  <link rel="stylesheet" href="{{url('css/projectes.css')}}">
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
  <script src="{{url('js/projectesfrontend.js')}}"></script>
  
  
@endsection