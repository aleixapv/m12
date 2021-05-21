<div class="card col-xl-3 col-md-10 service_card m-1">
  <img
    @if(isset($servei)) src="{{$servei->imatge}}" @else src=" " @endif 
    class="card-img-top mt-3"
    alt=""
  />
  <div class="card-body">
    <h5 class="card-title">@if(isset($servei)) {{$servei->nom}} @endif</h5>
    <p class="card-text">
      @if(isset($servei)) {!!$servei->descripcio!!} @endif
    </p>
  </div>
</div>