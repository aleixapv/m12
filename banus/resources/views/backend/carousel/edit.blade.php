@extends('layouts.backEndLayout')
@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Enrrere</a>
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
                <div class=" col-12">
                    <form action="{{route('carousel.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="imatge">Imatge de la diapositiva: <i class="req">*</i></label>
                            </div>
                            <div class="col-75">
                                <input type="file" name="imatge" id="imatgeNovaDiapositiva"  value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="alt">Alt del la diapositiva: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="alt" value="" id="altNovaDiapositiva">
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-25">
                                <label for="titol">Titol de la diapositiva: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="titol" value="" id="titolNovaDiapositiva">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-25">
                                <label for="descripcio">Descripció de la diapositiva: </label>
                            </div>
                            <div class="col-12">
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
    
    <div class="row">
        <div class="col-12">
            <span hidden id="instruccionsImatges"> Ordena les imatges <b>arrosegan-les</b> fins la posició desitjada:</span>
        </div>
        <div class="col-12 divSortable row mt-3" id="divImatges">
            @forelse ($carousel as $diapositiva)
                <div class="card border bg-light sortable-chosen" style="width: 12rem; height: 12rem;" draggable="true">
                    <img class="imatge card-img-top" style="width: 12rem; height: 8rem;" src="{{url($diapositiva->url)}}" alt="{{$diapositiva->alt}}" draggable="false">
                    <input type="number" name="ordre[{{$diapositiva->id}}]" hidden="hidden" value="{{$diapositiva->id}}" class="ordre">
                    <div class="card-body">
                        <p class="card-text">
                            <b class="ml-1 mr-1 numero"></b>
                            índesx.jpeg
                            <i class="fas fa-trash-alt text-danger eliminar" idImatge="{{$diapositiva->id}}"></i>
                            <i class="fas fa-edit text-success" data-toggle="modal" data-target="#modal_edit_diapositiva_{{$diapositiva->id}}"></i>
                        </p>
                        
                    </div>
                </div>
                <!--modal edit-->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="form" id="modal_edit_diapositiva_{{$diapositiva->id}}" >
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
                                <form action="{{route('carousel.update',['id' => $diapositiva->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <img src="{{url($diapositiva->url)}}" alt="">
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="imatge">Imatge de la diapositiva: </label>
                                        </div>
                                        <div class="col-75">
                                            <input type="file" name="imatge"   value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="alt">Alt del la diapositiva: </label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" name="alt" value="{{$diapositiva->alt}}" >
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="titol">Titol de la diapositiva: </label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" name="titol" value="{{$diapositiva->titol}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-25">
                                            <label for="descripcio">Descripció de la diapositiva: </label>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="descripcio" rows="3" id="descripcioNovaDiapositiva" class="textarea">{{$diapositiva->descripcio}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="submit" class="comprovar" value="Editar" id="crearNovaDiapositiva">
                                    </div>
                                </form>
                            </div>
                        
                            
                        </div>
                    </div>
                
                </div>
            <!--/modal edit-->
            @empty
                <p class="ml-4">No hi han diapositivas</p>
            @endforelse
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