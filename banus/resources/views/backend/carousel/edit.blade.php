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
    <div class="row">
        <input type="button" class="comprovar" id="novaDiapositiva" value="Nova diapositiva" data-toggle="modal" data-target="#modal_nova_diapositiva">
        
    </div>
   
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="form" id="modal_nova_diapositiva" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content col-12">
                
                <div class="modal-header">
                    
                    <h4 class="modal-title"><p class="text-center">
                        <strong>
                          <a href="#" class="text-dark text_titulo">Nova diapositiva: </a>
                        </strong>
                      </p></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="m-1">
                    <form id="novaDiapositivaForm" name='uploader'>
            
                        <div class="row">
                            <div class="col-25">
                                <label for="imatge">Imates de la diapositiva: <i class="req">*</i></label>
                            </div>
                            <div class="col-75">
                                <input type="file" name="imatge" id="imatgeNovaDiapositiva"  value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="alt">Alt del la diapositiva: <i class="req">*</i></label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="alt" value="" id="altNovaDiapositiva">
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-25">
                                <label for="titol">Titol de la diapositiva: <i class="req">*</i></label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="titol" value="" id="titolNovaDiapositiva">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-25">
                                <label for="descripcio">Descripció de la diapositiva: <i class="req">*</i></label>
                            </div>
                            <div class="col-75">
                                <textarea name="descripcio" rows="3" id="descripcioNovaDiapositiva"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" class="comprovar" value="Crear" id="crearNovaDiapositiva">
                        </div>
                    </form>
                </div>
               
                
            </div>
        </div>
      
    </div>
    
    
    
        <div id="divExemple" hidden>
            <br>
            <h3>Previsualització:</h3>
            <div class="row col-12">
                <div class="col-6">
                    <h6>Comprova si el resultat es el que vols a continuació.</h6>
                </div>
                <div class="col-12">
                    @include('frontend/carousel')
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Crear" >
            </div>
        </div>
    <script src="https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
    <script src="{{url('js/src/nanospell/autoload.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <script src="{{url('js/sortable.js')}}"></script>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/carousel.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection