@extends('layouts.frontEndLayout')
@section('content')
<div class="" id="containerprojecte">
      <!--Carousel Wrapper-->
      <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
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
      <br>
      <div class="container">
      <br>
      <div class="col-12">
      <div class="row ">
        <div class="col-md-4 .col-xs-12">
          <div class="service card">
            <a href="#"><h3>Titulo</h3></a> 
            <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img heigth="400" width="200"  src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg/1920px-The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img heigth="200" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg/1920px-The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img heigth="200" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg/1920px-The_Naval_Battle_Near_Ecnomus_%28256_BC%29.jpg" alt="New York">
    </div>
  </div>


</div>
            <p>descripció.</p>
          </div>
        </div>
        <div class="col-md-4 .col-xs-12">
          <div class="service card">
            <h3><strong>titulo</strong></h3>
            <hr>
            <p>descripció.</p>
          </div>
        </div>
        <div class="col-md-4 .col-xs-12">
          <div class="service card"> 
            <h3><strong>titulo</strong></h3>
            <hr>
            <p>descripció.</p>
          </div>
        </div>
      </div>
    </div>  
      <br>
    </div>
<!--/.Carousel Wrapper-->
  </div>
  <link rel="stylesheet" href="{{url('css/index.css')}}">
@endsection