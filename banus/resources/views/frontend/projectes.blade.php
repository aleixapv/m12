@extends('layouts.frontEndLayout')
@section('content')
  @php
    $contador = 1;
  @endphp
  <div id="projectes_body">

    <div class="dropdown show  d-block d-lg-none mt-5 ml-2">
      <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Categories
      </a>
      <div class="dropdown-menu" id="menu_categories" aria-labelledby="dropdownMenuLink">
        <div class="work">
          <div class="category-buttons">
            <a href="#" class="active all " data-group="all">Tot</a>
            @forelse ($categories as $categoria)
              <a href="#" class="" data-group="{{$categoria->name}}">{{$categoria->name}}</a>
            @empty
              <a class="dropdown-item" href="#">Sense categories</a>
            @endforelse
          </div>
        </div>
      </div>
    </div>
    
    <div class="work">
      <div class="category-buttons d-none d-lg-block">
        <a href="#" class="active all" data-group="all">Tot</a>
        @forelse ($categories as $categoria)
          <a href="#" data-group="{{$categoria->name}}">{{$categoria->name}}</a>
        @empty
          <a class="dropdown-item" href="#">Sense categories</a>
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
  <script src="{{url('js/projectesfrontend.js')}}"></script>
@endsection
