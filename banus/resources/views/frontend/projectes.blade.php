@extends('layouts.frontEndLayout')
@section('content')
  @php
    $contador = 1;
  @endphp
  @forelse ($projectesObj as $projecte)
    <div class="col-12">
      <div class="row border-bottom border-dark mt-5 mb ml-1" id="containerprojecte">
        <!--Carousel Wrapper-->
        <div id="carousel-example-{{$contador}}z" class="carousel slide carousel-fade col-xl-7 col-md-12 " data-ride="carousel">
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
        <div class="col-xl-4 col-md-12 ml" id="text_projecte">
          <div>
              <p class="text-center">
                <strong>
                  <a href="#" class="text-dark" id="text_titulo">{{$projecte['titol']}}</a>
                </strong>
              </p>
              <p class="text-center text-justify">{{$projecte['data']}}
              </p>
              <p class="text-center text-justify">{{$projecte['descripcio_breu']}}
              </p>
              <p class="text-center text-justify">{{$projecte['descripcio_detallada']}}
              </p>
              <!--<button class="boto_informacio">Mes Informacio</button>-->
            </div>
        </div>
        <div class="col-5 mb-5"></div>
      </div>
    </div>
    @php
      $contador ++;
    @endphp
  @empty
      <h1>No hi han projectes en aquest moment</h1>
  @endforelse
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
@endsection