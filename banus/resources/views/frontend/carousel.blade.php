<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade carousel_index" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      @forelse ($carousel as $diapositiva)
        <div class="carousel-item @if($loop->first) active @endif">
          <img class="d-block  w-100" src="{{url($diapositiva->url)}}" alt="First slide">
            <div class="carousel-caption d-flex flex-column justify-content-start " id="frase_index" style=" @if($loop->first) display: none; @endif">
              @if ($diapositiva->titol != null)
                <h1 style="color: {{$diapositiva->color}};">{{$diapositiva->titol}}</h1>
              @endif
              @if ($diapositiva->descripcio != null)
                 <div style="color: {{$diapositiva->color}};">{!!$diapositiva->descripcio!!}</div> 
              @endif
          </div>
        </div>
      @empty
          
      @endforelse
      
      <!--/First slide-->
      
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>