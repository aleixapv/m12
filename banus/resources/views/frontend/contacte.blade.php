@extends('layouts.frontEndLayout')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
    <link rel="stylesheet" href="{{url('css/contacte.css')}}">
    <script src="{{url('js/contactefrontend.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <br class="d-block d-lg-none">
<br class="d-block d-lg-none">
<br class="d-block d-lg-none">
<br class="d-block d-lg-none">
<div id="containerprojecte" class="d-flex justify-content-center col-12">


    <section id="contact">
  
        <h1 class="section-header">Contacta</h1>
        
        <div class="contact-wrapper col-12">
          
            <!---------------- 
      
            CONTACT PAGE LEFT 
          
            -----------------> 
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
          <form id="contact-form" class="form-horizontal col-6 .col-sm-12" role="form" action="{{route('contacte.mail')}}" method="POST">
            @csrf
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="name" placeholder="Nom cognoms" name="nom_contacte" value="{{old('nom_contacte')}}" required>
              </div>
            </div>

    
      
            <div class="form-group">
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Correu electrònic" name="email_contacte" value="{{old('email_contacte')}}" required>
              </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                  <input type="tel" class="form-control"  placeholder="Telèfon de contacte" name="tel_contacte" value="{{old('tel_contacte')}}" required>
                </div>
              </div>

           
      
            <textarea class="form-control" rows="10" placeholder="Escriu el teu correu" name="missatge_contacte" required>{{old('missatge_contacte')}}</textarea>
            
            <button class="btn btn-primary send-button" id="submit" type="submit" value="Enviar">
              <div class="button">
                <i class="fa fa-paper-plane"></i><span class="send-text">Enviar</span>
              </div>
            
            </button>

            
            
          </form>
          
            <!---------------- 
      
            CONTACT PAGE RIGHT 
          
            -----------------> 
          
            <div class="direct-contact-container ml-2 col-6 .col-sm-12"  >
      
              <ul class="contact-list">
                <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place"><a target=”_blank” href="https://www.google.es/maps/place/{{$informacio->adreca_1}},+{{$informacio->zip_cp}}+{{$informacio->ciutat}},+{{$informacio->provincia}}/">{{$informacio->ciutat}} </a></span></i></li>
                
                <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:{{$informacio->tel}}" >{{$informacio->tel}}</a></span></i></li>
                
                <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:{{$informacio->correu}}"> {{$informacio->correu}} </a></span></i></li>
                
              </ul>
      
              <hr>
              <ul class="social-media-list">
                  @if (isset($informacio->whatsapp))
                    <li>
                        <a href="https://api.whatsapp.com/send?phone={{$informacio->whatsapp}}" target="_blank" class="contact-icon"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </li>
                  @endif
                  @forelse ($xarxes as $xarxa)
                    <li><a href="{{$xarxa->enllac}}" target="_blank" class="contact-icon">
                        <i class="{{$xarxa->icona}}" aria-hidden="true"></i></a>
                    </li>
                  @empty
                      
                  @endforelse
              </ul>
              <hr>
      
              <div class="copyright">&copy; ALL OF THE RIGHTS RESERVED</div>
      
            </div>
          
        </div>
        <div class="d-flex justify-content-center col-12 ">
            <div class="float-left mt-5 " id="map" x="{{$informacio->x}}" y="{{$informacio->y}}">

            </div>
        </div>
        
        
    </section> 
</div>
@endsection