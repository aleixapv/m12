@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    
    <div class="alert alert-danger" id="error" hidden>
        Omple els camps requerits <i class="req">*</i>.
    </div>
    <form action="{{route('projectes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-25">
                <h3>Informació:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="titol">Titol del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="titol" value="{{ old('titol') }}" id="titol">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_breu">Descripció breu del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_breu" id="descripcio_breu">{{ old('descripcio_breu') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">Descripció detallada del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_detallada" id="descripcio_detallada">{{ old('descripcio_detallada') }}</textarea>
            </div>
        </div>
       
        <div class="row">
            <div class="col-25">
                <label for="categories">Categorias del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="categories[]" multiple id="categories">
                    @forelse ($categories as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @empty
                        <p>No hi han categories</p>
                    @endforelse
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <h3>Imatges:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">Imates del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="file" name="imatges[]" id="imatges" multiple value="{{ old('imatges') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <span> Ordena les imatges:</span>
            </div>
            <div class="col-75 divSortable" id="divImatges">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <h3>Ubicació:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-25">
                <label for="provincia">Provincia: </label>
            </div>
            <div class="col-75">
                <select id="selecProvincia">
                </select>
                <input type="text" id="provinciaInput" name="provincia" value="" hidden>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="ciutat">Poblacio: </label>
            </div>
            <div class="col-75">
                <select name="" id="selecPoblacio">
                    
                </select>
                <input type="text" id="poblacioInput" name="ciutat" value="" hidden>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="zip_cp">Codi postal: </label>
            </div>
            <div class="col-75">
                <select name="" id="selecCp">
                    
                </select>
                <input type="text" id="cpInput" name="zip_cp" value="" hidden>
            </div>
        </div>
        
        <div class="row">
            <input type="button" class="comprovar" id="comprovar" value="Comprovar">
        </div>
        <div id="divExemple" hidden>
            <br>
            <h3>Previsualització:</h3>
            <div class="row col-12">
                <div class="col-6">
                    <h6>Comprova si el resultat es el que vols a continuació.</h6>
                </div>
               <!--projecte-->
                <div class="col-12">
                    <div class="row" id="containerprojecte">
                      <!--Carousel Wrapper-->
                      <div id="carousel-example-1z" class="carousel slide carousel-fade mt-5 col-xl-7 col-md-12 " data-ride="carousel">
                        <!--Indicators-->
                        <ol class="carousel-indicators" id="olIndicadors">
                           <!--<li data-target="#carousel-example-1z" data-slide-to="0"   class="active"></li>-->
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox" id="slidesDiv">
                           <!-- <div class="carousel-item  active ">
                              <img class="d-block img-fluid" width="900" height="450" src=""
                                alt="">
                            </div>-->
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
                      <div class="col-xl-4 col-md-12 mt-5" id="text_projecte">
                        <div>
                            <p class="text-center">
                              <strong>
                                <a href="#" class="text-dark" id="text_titulo"></a>
                              </strong>
                            </p>
                            <p class="text-center text-justify" id="localitzacioExemple">
                            </p>
                            
                            <p class="text-center text-justify d-block d-lg-none" id="breuExemple">descipcio breu
                            </p>
                            <p class="text-center text-justify d-none d-lg-block detalladaExemple" id="detalladaExemple">descripcio detallada
                            </p>
                            <div id="detallada_boto1"  class=" ver_mas text-center text-justify d-block d-lg-none">
                              <p class="text-primary"">Click per veure més.</p>
                              <p id="detallada_boto1" class="text-center text-justify detalladaExemple" hidden="true">descipcio detallada
                              </p>
                            </div>
                            <br>
                            
                            <!--<button class="boto_informacio">Mes Informacio</button>-->
                          </div>
                      </div>
                      <div class="col-5 mb-5"></div>
                    </div>
                  </div>
                  <!--/projecte-->
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Crear" >
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/sortable.js')}}"></script>
    <script src="{{url('js/informacio.js')}}"></script>
    <script src="{{url('js/projectesfrontend.js')}}"></script>
    <script src="{{url('js/projectes.js')}}"></script>
@endsection