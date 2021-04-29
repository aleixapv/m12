@extends('layouts.frontEndLayout')
@section('content')
    <div class="row border-bottom border-dark mt-5 mb ml-4" id="containerprojecte">
      <!--Carousel Wrapper-->
      <div id="carousel-example-1z" class="carousel slide carousel-fade col-5" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-1z" data-slide-to="1"></li>
          <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <!--First slide-->
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
              alt="First slide">
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
<!--/.Carousel Wrapper-->
    <div class="col-7">
      <div>
          <p class="text-center">
            <strong>
              TITULO
            </strong>
          </p>
          <p class="text-center text-justify">Descripcion brebe. Su historia se desarrolla en la Tercera Edad del Sol de la Tierra Media, un lugar ficticio poblado por hombres y otras razas antropomorfas como los hobbits, los elfos o los enanos, así como por muchas otras criaturas reales y fantásticas. La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro, Sauron.</p>
          <a href="something" class="button1">Mas Informacion</a>
        </div>
    </div>
    <div class="col-12 mb-5"></div>
    </div>
    <div class="row border-bottom border-dark mt-5 mb ml-4" id="containerprojecte">
      <!--Carousel Wrapper-->
      <div id="carousel-example-1z" class="carousel slide carousel-fade col-5" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-1z" data-slide-to="1"></li>
          <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <!--First slide-->
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
              alt="First slide">
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
<!--/.Carousel Wrapper-->
    <div class="col-7">
      <p>asdasd</p>
    </div>
    <div class="col-12 mb-5"></div>
    </div>
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script>
      $('.carousel').carousel({
        interval: 2000
      })
    </script>
@endsection