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
	</head>
	<body>
	<section class="ftco-section">
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
				<img src="{{url($informacio->url_logo)}}" id="logo_navbar" width="50px" height="50px">
				<a class="navbar-brand d-none d-lg-block" id="title_navbar" href="index.html">{{$informacio->nom_empresa}}</a>
	      <button class="navbar-toggler" id="boton_menu" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse justify-content-center col-11" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="{{route('f.index')}}" class="nav-link">Inici</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Contacte</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">Nosaltres</a></li>
				<li class="nav-item"><a href="{{route('projectes.view')}}" class="nav-link">Projectes</a></li>
	        	<li class="nav-item dropdown">
              <a class="nav-link" href="{{ route('projectes.view') }}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Projectes</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
				  @forelse ($categories as $categoria)
				  	<a class="dropdown-item" href="#">{{$categoria->name}}</a>
				  @empty
				  	<a class="dropdown-item" href="#">Sense categories</a>
				  @endforelse
              </div>
            </li>
	        </ul>
	      </div>
		  <div class="col-1 d-none d-lg-block">
			  @forelse ($xarxes as $xarxa)
				  <a href="{{$xarxa->enllac}}"><i class="fab fa-instagram"></i></a>
			  @empty
				  <p>Xarxes soscials no disponibles</p>
			  @endforelse
		  </div>
	    </div>
	  </nav>
	  <a href="https://api.whatsapp.com/send?phone={{$informacio->whatsapp}}" target="_blank">whatsap</a>
	  @yield('content')
	</section>
	  <!-- Site footer -->
	  <footer class="site-footer mt-5 ml-3">
		<div class="container">
		  <div class="row">
			<div class="col-sm-12 col-md-6">
			  <h6>contacte</h6>
			  <p class="text-justify">EMAIL: {{$informacio->correu}}
				  <br> TELEFON: {{$informacio->tel}}
				  <br> DIRECCIÓ: {{$informacio->adreca_1}}{{$informacio->adreca_2}}, {{$informacio->ciutat}}
			  </p>
			</div>
  
			<div class="col-xs-6 col-md-3">
			  <h6>Categories</h6>
			  <ul class="footer-links">
				<li><a href="#">Projectes</a></li>
				<li><a href="#">Qui Som</a></li>
				<li><a href="#">Serveis</a></li>
				<li><a href="#">Inici</a></li>
				<li><a href="#">Politica de Privacitat</a></li>
			  </ul>
			</div>
			<!--<div class="col-md-3 mb-3 d-none d-lg-block">
				<div style="width: 100%"><iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=200&amp;hl=es&amp;q=Carrer%20d'Avinyonet%20del%20Pened%C3%A8s,%2015,%2008720%20Vilafranca%20del%20Pened%C3%A8s+(Fusteria%20Ban%C3%BAs)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/"></a></div>
			</div>-->
			
  
		<div class="container mt-3 border-top border-dark">
		  <div class="row mt-2">
			<div class="col-md-8 col-sm-6 col-xs-12">
			  <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
		   <a href="#">{{$informacio->nom_empresa}}</a>.
			  </p>
			</div>
  
			<div class="col-md-4 col-sm-6 col-xs-12">
			  <ul class="social-icons">
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>  
			  </ul>
			</div>
		  </div>
		</div>
  </footer>

	<script src="{{url('js/src/jquery.min.js')}}"></script>
  <script src="{{url('js/src/popper.js')}}"></script>
  <script src="{{url('js/src/bootstrap.min.js')}}"></script>
  <script src="{{url('js/src/main.js')}}"></script>
	</body>
</html>

