@extends('layouts.frontEndLayout')
@section('content')
  @php
    $contador = 1;
  @endphp
  <div id="projectes_body">
    <br>
    <br>

    <!--select categories-->
    <ul class="navbar-nav m-auto">
      <li class="nav-item dropdown">
        <a class="ml-5 text-dark mt-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtrador de Categories ↓</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04" id="filtrador">
            <p>Seleciona un filtre</p>
            @forelse ($categories as $categoria)
              <input class="border-bottom border-dark mr-3" border-dark" type="checkbox" href="#">{{$categoria->name}}</a> <br>
              <p class="mb-2"></p>
            @empty
              <a class="dropdown-item" href="#">Sense categories</a>
            @endforelse
          </div>
      </li>
    </ul>
    <!--/select categories-->

  @forelse ($projectesObj as $projecte)
    @include('frontend/projecte')
    <br>
    @php
      $contador ++;
    @endphp
  @empty
      <h1>No hi han projectes en aquest moment</h1>
  @endforelse
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script src="{{url('js/projectesfrontend.js')}}"></script>
@endsection
</div>