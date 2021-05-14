<!doctype html>
<html lang="en">
  <head>
  	<title>{{$informacio->nom_empresa}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('css/frontEndLayout.css')}}">

	<script src="https://kit.fontawesome.com/11b884f405.js" crossorigin="anonymous"></script>
	<script src="{{url('js/src/jquery.min.js')}}"></script>
	<script src="{{url('js/src/popper.js')}}"></script>
	<script src="{{url('js/src/bootstrap.min.js')}}"></script>
	<script src="{{url('js/src/main.js')}}"></script>
	</head>
	<body>
	<section class="ftco-section">
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light sticky-top" id="ftco-navbar">
	    <div class="container sticky-top" id="navbar_banus">
				<img src="{{url($informacio->url_logo)}}" alt="{{$informacio->alt_logo}}" id="logo_navbar" width="50px" height="50px">
				<a class="navbar-brand d-none d-lg-block" id="title_navbar" href="index.html">{{$informacio->nom_empresa}}</a>
	      <button class="navbar-toggler" id="boton_menu" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span>
	      </button>
	      <div class="collapse navbar-collapse justify-content-center col-11" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="{{route('f.index')}}" class="nav-link">Inici</a></li>
				<li class="nav-item"><a href="{{route('contacte.view')}}" class="nav-link">Contacte</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">Nosaltres</a></li>
				<li class="nav-item"><a href="{{route('projectes.view')}}" class="nav-link">Projectes</a></li>
	        	<li class="nav-item dropdown">
              
            </li>
	        </ul>
	      </div>
		  <div class="col-1 d-none d-lg-block" style="font-size: 23px;">
			  @forelse ($xarxes as $xarxa)
				  <a href="{{$xarxa->enllac}}" ><i  class="{{$xarxa->icona}}"></i></a>
			  @empty
				  <p></p>
			  @endforelse
		  </div>
	    </div>
	  </nav>
	  <!--<a href="https://api.whatsapp.com/send?phone={{$informacio->whatsapp}}" target="_blank">whatsap</a>-->
	  @yield('content')
	</section>
	
	  <!-- Site footer -->
	  <footer class="site-footer mt-5 ml-3">
		<div class="container">
		  <div class="row">
			<div class="col-sm-12 col-md-6">
			  <h6>contacte</h6>
			  <p class="text-justify">EMAIL: <a class="link-primary" href="mailto:{{$informacio->correu}}"> {{$informacio->correu}} </a>
				  <br> TELEFON: {{$informacio->tel}}
				  @if (isset($informacio->tel2))
                	<br>SEGON TELEFON: {{$informacio->tel2}}
              	  @endif
				  <br> DIRECCIÓ: <a class="link-primary" target=”_blank” href="https://www.google.es/maps/place/Fusteria+Ban%C3%BAs/@41.3502168,1.7077639,17z/data=!3m2!4b1!5s0x12a47a2988ea0e57:0xcba54c259367194!4m5!3m4!1s0x12a479e8c654d949:0xbc67939504c48504!8m2!3d41.3502168!4d1.7099526"> {{$informacio->adreca_1}}, {{$informacio->zip_cp}} {{$informacio->ciutat}}, {{$informacio->provincia}} </a>
			  </p>
			</div>
  
			<div class="col-xs-6 col-md-3">
			  <h6>Categories</h6>
			  <ul class="footer-links">
				<li><a href="#">Projectes</a></li>
				<li><a href="#">Qui Som</a></li>
				
				<li><a href="#">Inici</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modal_politica">Politica de Privacitat</a>
				@include('frontend/politica')
				</li>
			  </ul>
			</div>
			<!--<div class="col-md-3 mb-3 d-none d-lg-block">
				<div style="width: 100%"><iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=200&amp;hl=es&amp;q=Carrer%20d'Avinyonet%20del%20Pened%C3%A8s,%2015,%2008720%20Vilafranca%20del%20Pened%C3%A8s+(Fusteria%20Ban%C3%BAs)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/"></a></div>
			</div>-->
			
  
		<div class="container mt-3 border-top border-dark">
		  <div class="row mt-2">
			<div class="col-md-8 col-sm-6 col-xs-12">
			  <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
		   		{{$informacio->nom_empresa}}.
			  </p>
			</div>
  
			<div class="col-md-4 col-sm-6 col-xs-12">
			  <ul class="social-icons">
			  @forelse ($xarxes as $xarxa)
			  	<li>
				  <a href="{{$xarxa->enllac}}"><i class="{{$xarxa->icona}}"></i></a>
				</li>
			  @empty
				  <p></p>
			  @endforelse
		  	</div>
			  </ul>
			</div>
		  </div>
		</div>
  </footer>
 	 @if (isset($informacio->whatsapp))
  		<a href="https://api.whatsapp.com/send?phone={{$informacio->whatsapp}}" target="_blank" ><img src="{{url('img/img_whatsapp.png')}}" id="whatsapp"></a>
	@endif
  

	
	</body>
</html>

