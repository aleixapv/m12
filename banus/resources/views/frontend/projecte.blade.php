<div class="col-12">
  <div class="row" id="containerprojecte">
    <!--Carousel Wrapper-->
    @if(!isset($contador))
     @php
        $contador = 1;
     @endphp
    @endif
    <div id="carousel-example-{{$contador}}z" class="carousel slide carousel-fade mt-5 col-xl-7 col-md-12 " data-ride="carousel">
      <!--Indicators-->
      <ol class="carousel-indicators" id="olIndicadors">
        @if(isset($projecte['imatges']))
          @php
            $numero = 0;
          @endphp
          @foreach ($projecte['imatges'] as $imatge)
            <li data-target="#carousel-example-{{$contador}}z" data-slide-to="{{$numero}}"  @if($loop->first) class="active" @endif></li>
            @php
              $numero ++ ;
            @endphp
          @endforeach
        @endif
      </ol>
      <!--/.Indicators-->
      <!--Slides-->
      <div class="carousel-inner" role="listbox" id="slidesDiv">
        @if(isset($projecte['imatges']))
          @foreach ($projecte['imatges'] as $imatge)
            <div class="carousel-item @if($loop->first) active @endif">
              <img class="d-block img-fluid" width="900" height="450" src="{{ url($imatge['url']) }}"
                alt="{{$imatge['alt']}}">
            </div>
          @endforeach
        @endif
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
              <a href="#" class="text-dark" id="text_titulo">@if(isset($projecte)) {{$projecte['titol']}} @endif</a>
            </strong>
          </p>
          <p class="text-center text-justify" id="localitzacioExemple" >@if(isset($projecte)) {{$projecte['ciutat']}}, {{$projecte['provincia']}} @endif</p>
          
          <p class="text-center text-justify d-block d-lg-none" id="breuExemple">@if(isset($projecte)) {{$projecte['descripcio_breu']}} @endif</p>
          <p class="text-center text-justify d-none d-lg-block detalladaExemple" >@if(isset($projecte)) {{$projecte['descripcio_detallada']}} @endif</p>
          <div id="detallada_boto{{$contador}}"  class=" ver_mas text-center text-justify d-block d-lg-none">
            <p class="text-primary"">Click per veure més</p>
            <p id="detallada_boto{{$contador}}" class="text-center text-justify detalladaExemple" hidden="true" >@if(isset($projecte)) {{$projecte['descripcio_detallada']}} @endif
            </p>
          </div>
          <br>
          <p class="text-center text-justify" id="data_projecte" style="position:absolute; right:0px; bottom:0px;">@if(isset($projecte)) {{$projecte['data']}} @endif
          </p>
          <!--<button class="boto_informacio">Mes Informacio</button>-->
        </div>
    </div>
    <div class="col-5 mb-5"></div>
  </div>
</div>


