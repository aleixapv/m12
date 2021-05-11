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
    <form action="{{route('projectes.update',['id' => $projecte->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                <input type="text" name="titol" value="{{ $projecte->titol }}" id="titol">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_breu">Descripció breu del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_breu" rows="3" id="descripcio_breu">{{ $projecte->descripcio_breu }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio_detallada">Descripció detallada del projecte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio_detallada" rows="6" id="descripcio_detallada">{{ $projecte->descripcio_detallada }}</textarea>
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
            <div class="col-12">
                <span hidden id="instruccionsImatges"> Ordena les imatges <b>arrosegan-les</b> fins la posició desitjada:</span>
            </div>
            <div class="col-12 divSortable row mt-3" id="divImatges">
                @forelse ($imatges as $imatge)
        <div>
            <img src="{{url($imatge->url)}}" alt="{{$imatge->alt}}">
            <button class="eliminar" idImatge="{{$imatge->id}}">Eliminar</button>
        </div><br>
    @empty
        <p>No hi han imatges</p>
    @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <h3>Ubicació:</h3>
            </div>
            <div class="col-75">
                <option value=""></option>
            </div>
        </div> 
        <div class="row">
            <div class="col-25">
                <label for="provincia">Provincia: </label>
            </div>
            <div class="col-75">
                <select id="selecProvincia">
                    <option value="{{ $categoria->provincia }}">{{ $categoria->provincia }}</option>
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
                    <option value="{{ $categoria->ciutat }}">{{ $categoria->ciutat }}</option>
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
                    <option value="{{ $categoria->zip_cp }}">{{ $categoria->zip_cp }}</option>
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
                    <h6>Comprova si el resultat es el que vols dins del recuadre.</h6>
                </div>
                <div class="col-6 container">
                    <div>
                        <h6 id="nomExemple"></h6>
                        <h6 id="descripcioExemple"></h6>
                        <img src="" alt="" id="imatgeExemple">
                    </div>
                </div>
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
