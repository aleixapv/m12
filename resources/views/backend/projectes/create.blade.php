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
    <form action="{{route('projectes.store')}}" method="POST" enctype="multipart/form-data" id="form">
        @csrf

        <div class="row">
            <div class="col-25">
                <h3>InformaciĆ³:</h3>
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

        {{--<div class="row">
            <div class="col-25">
                <label for="descripcio_breu">DescripciĆ³ breu del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_breu" rows="3" id="descripcio_breu">{{ old('descripcio_breu') }}</textarea>
            </div>
        </div>--}}

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">DescripciĆ³ detallada del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_detallada" rows="6" id="descripcio_detallada">{{ old('descripcio_detallada') }}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-25">
                <h3>Categories:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-25">
                <label for="categories">Categories del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <div class="d-flex justify-content-start">
                    @forelse ($categories as $categoria)
                        <div class="form-check mr-2 mb-2">
                            <input class="form-check-input categories" type="checkbox" value="{{$categoria->id}}" name="categories[]" >
                            <label class="form-check-label ml-2" for="defaultCheck1">
                                {{$categoria->name}}
                            </label>
                        </div>
                    @empty
                        <p>No hi han categories</p>
                    @endforelse
                </div>
                {{--<select name="categories[]" multiple id="categories">
                    @forelse ($categories as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                    @empty
                        <p>No hi han categories</p>
                    @endforelse
                </select>--}}
            </div>
        </div>
        <hr>
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
            <div class="col-12">
                <span hidden id="instruccionsImatges"> Ordena les imatges <b>arrosegan-les</b> fins la posiciĆ³ desitjada:</span>
            </div>
            <div class="col-12 divSortable row mt-3" id="divImatges">
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-25">
                <h3>UbicaciĆ³:</h3>
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
                    <option value="null"></option>
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
                    <option value="null"></option>
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
                    <option value="null"></option>
                </select>
                <input type="text" id="cpInput" name="zip_cp" value="" hidden>
            </div>
        </div>
        
        <div class="row">
            <input type="button" class="comprovar" id="comprovar" value="Comprovar">
        </div>
        <div id="divExemple" hidden>
            <br>
            <h3>PrevisualitzaciĆ³:</h3>
            <div class="row col-12">
                <div class="col-6">
                    <h6>Comprova si el resultat es el que vols a continuaciĆ³.</h6>
                </div>
                <div class="col-12 m-5">
                    @php
                        $contador = 1;
                    @endphp
                    <div class="work mb-5">
                        <div class="category-buttons d-none d-lg-block">
                            <a href="#" class="active all" data-group="all" hidden>Tot</a>
                        </div>
                    
                        <div id="grid"" class="grid">
                            @include('frontend/projecte')
                            <br>
                            @php
                                $contador ++;
                            @endphp
                        
                            <a class="card" href="#" data-groups="" hidden>
                                <img src="" />
                                <div class="title">Project Title</div>
                            </a>
                            
                            <div class="guide"></div>
                        </div>
                    </div>
                    @php
                        $contador = 1;
                    @endphp
                    
                    @include('frontend/modalProjecte')
                    @php
                        $contador ++;
                    @endphp
                </div>
                
                
                    
                    
                
                   
                
            </div>
            <br>
            <div class="row mt-5">
                <input type="submit" value="Crear" >
            </div>
        </div>
    </form>
    <script src="https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
    <script src="{{url('js/src/nanospell/autoload.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="{{url('css/projectes.css')}}">
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/sortable.js')}}"></script>
    <script src="{{url('js/informacio.js')}}"></script>
    <script src="{{url('js/projectesfrontend.js')}}"></script>
    <script src="{{url('js/projectes.js')}}"></script>

@endsection