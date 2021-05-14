<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" @if(isset($projecte))id="modal_{{$projecte['id']}}" @else id="modal_" @endif>
    <div class="modal-dialog modal-lg">
        <div class="modal-content col-12">
            
            <div class="modal-header">
                
                <h4 class="modal-title"><p class="text-center">
                    <strong>
                      <a href="#" class="text-dark text_titulo" id="text_titulo">@if(isset($projecte)) {{$projecte['titol']}} @endif</a>
                    </strong>
                  </p></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            @if(!isset($contador))
                @php
                    $contador = 1;
                @endphp
            @endif
           <div id="carousel-example-{{$contador}}z" class="carousel slide carousel-fade mt-5  col-12" data-ride="carousel">
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
           <div class="col-12 mt-5" id="text_projecte">
           
                <div class="col-12">
                    <p class="text-center text-justify" id="localitzacioExemple" >@if(isset($projecte['provincia'])) Ubicació: {{$projecte['ciutat']}}, {{$projecte['provincia']}} @endif</p>
                
                    <p class="d-block d-lg-none" id="breuExemple">@if(isset($projecte)) {!!$projecte['descripcio_breu']!!} @endif</p>
                    <p class=" d-none d-lg-block detalladaExemple" >@if(isset($projecte)) {!!$projecte['descripcio_detallada']!!} @endif</p>
                    <div id="detallada_boto{{$contador}}"  class=" ver_mas  d-block d-lg-none">
                      <p class="text-primary"">Click per veure més</p>
                        <div hidden="true">
                            <p id="detallada_boto{{$contador}}" class=" detalladaExemple" hidden="true" >@if(isset($projecte)) {!!$projecte['descripcio_detallada']!!} @endif
                            </p>
                        </div>
                    </div>
                    <br>
                    <p class="text-center text-justify" id="" >@if(isset($projecte)) Data de publicació: {{$projecte['data']}} @endif
                    </p>
                </div>
                
                
              
            </div>
            
        </div>
    </div>
  
</div>
