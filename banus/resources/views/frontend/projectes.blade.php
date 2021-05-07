@extends('layouts.frontEndLayout')
@section('content')
  @php
    $contador = 1;
  @endphp
  <div id="projectes_body">
    <br>
    <br>
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
  @forelse ($projectesObj as $projecte)
    <div class="col-12">
      <div class="row" id="containerprojecte">
        <!--Carousel Wrapper-->
        <div id="carousel-example-{{$contador}}z" class="carousel slide carousel-fade mt-5 col-xl-7 col-md-12 " data-ride="carousel">
          <!--Indicators-->
          <ol class="carousel-indicators">
            @php
              $numero = 0;
            @endphp
            @foreach ($projecte['imatges'] as $imatge)
              <li data-target="#carousel-example-{{$contador}}z" data-slide-to="{{$numero}}"  @if($loop->first) class="active" @endif></li>
              @php
                $numero ++ ;
              @endphp
            @endforeach
          </ol>
          <!--/.Indicators-->
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            @foreach ($projecte['imatges'] as $imatge)
              <div class="carousel-item @if($loop->first) active @endif">
                <img class="d-block img-fluid" width="900" height="450" src="{{ url($imatge['url']) }}"
                  alt="{{$imatge['alt']}}">
              </div>
            @endforeach
          </div>
          <!--/.Slides-->
          <!--Controls-->
          <a class="carousel-control-prev" href="#carousel-example-{{$contador}}z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-{{$contador}}z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
        <div class="col-xl-4 col-md-12 mt-5" id="text_projecte">
          <div>
              <p class="text-center">
                <strong>
                  <a href="#" class="text-dark" id="text_titulo">{{$projecte['titol']}}</a>
                </strong>
              </p>
              <p class="text-center text-justify">Localització
              </p>
              
              <p class="text-center text-justify d-block d-lg-none">{{$projecte['descripcio_breu']}}
              </p>
              <p class="text-center text-justify d-none d-lg-block">{{$projecte['descripcio_detallada']}}
              </p>
              <div id="detallada_boto{{$contador}}"  class=" ver_mas text-center text-justify d-block d-lg-none">
                <p class="text-primary"">Click para ver mas</p>
                <p id="detallada_boto{{$contador}}" class="text-center text-justify" hidden="true">{{$projecte['descripcio_detallada']}}
                </p>
              </div>
              <br>
              <p class="text-center text-justify" id="data_projecte" style="position:absolute; right:0px; bottom:0px;">{{$projecte['data']}}
              </p>
              <!--<button class="boto_informacio">Mes Informacio</button>-->
            </div>
        </div>
        <div class="col-5 mb-5"></div>
      </div>
    </div>
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