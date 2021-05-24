<div class="card col-xl-3 col-md-10 service_card m-1" >
  <img
    @if(isset($servei)) src="{{$servei->imatge}}" @else src=" " @endif 
    class="card-img-top mt-3"
    alt=""
    id="imatgeExemple"
  />
  <div class="card-body">
    <h5 class="card-title" id="nomExemple">@if(isset($servei)) {{$servei->nom}} @endif</h5>
    <div class="card-text" id="descripcioExemple">
      @if(isset($servei)) {!!$servei->descripcio!!} @endif
    </div>
  </div>
</div>