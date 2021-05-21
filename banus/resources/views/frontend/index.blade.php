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
    @if(isset($projectesObj))
    @php
    $contador = 1;
    @endphp
  
    <br>
    
    
    <div class="work">
      <div class="category-buttons d-none d-lg-block" hidden>
        <a href="#" class="active all" data-group="all" hidden>Tot</a>
        @forelse ($categories as $categoria)
          <a href="#" data-group="{{$categoria->name}}" hidden>{{$categoria->name}}</a>
        @empty
          <a class="dropdown-item" href="#" hidden>Sense categories</a>
        @endforelse
      </div>
    
      <div id="grid"" class="grid">
        @forelse ($projectesObj as $projecte)
          @include('frontend/projecte')
          <br>
          @php
            $contador ++;
          @endphp
        @empty
            <h1>No hi han projectes en aquest moment</h1>
        @endforelse
  
        <a class="card" href="#" data-groups="@foreach($categories as $categoria){{$categoria->name}},@endforeach" hidden>
          <img src="" />
          <div class="title">Project Title</div>
        </a>
        
        <div class="guide"></div>
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
    @endif
    <br>
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script src="{{url('js/projectesfrontend.js')}}"></script>
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
  
  
@endsection