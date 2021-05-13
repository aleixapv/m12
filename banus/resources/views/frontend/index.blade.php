@extends('layouts.frontEndLayout')
@section('content')
<br class="d-block d-lg-none">
<br class="d-block d-lg-none">

<div class="" id="containerprojecte">
      <!--Carousel Wrapper-->
      <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <!--First slide-->
          <div class="carousel-item active">
            <img class="d-block  w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
              alt="First slide">
              <div class="carousel-caption" id="frase_index" style="display: none; ">
                <h3>Fusteria Banús</h3>
                <p>La millor Fusteria</p>
            </div>
          </div>
          <!--/First slide-->
          <!--Second slide-->
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
              alt="Second slide">
          </div>
          <!--/Second slide-->
          <!--Third slide-->
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
              alt="Third slide">
          </div>
          <!--/Third slide-->
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
      <br>
      <div class="row" id="card_index" style="display: none;">
        @forelse ($serveis as $servei)
          @include('frontend/servei')
        @empty
            
        @endforelse
        
      </div>
      <br>
      <div class="container">
      <br>
</div>
  <link rel="stylesheet" href="{{url('css/index.css')}}">
  <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection