@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('informacio.empresa.update')}}" method="POST" enctype="multipart/form-data">
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
                <label for="nom_empresa">Nom de la empresa: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="nom_empresa" value="{{ $informacio->nom_empresa }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="eslogan">Eslogan:</label>
            </div>
            <div class="col-75">
                <input type="text" name="eslogan" value="{{ $informacio->eslogan }}">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="imatge">Logo actual: </i></label>
            </div>
            <div class="col-75">
                <img src="{{ url($informacio->url_logo) }}" alt="{{ $informacio->alt_logo }}"  width="50px" height="50px">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="imatge">Nou logo de la empresa: </label>
            </div>
            <div class="col-75">
                <input type="file" name="imatge"  value="{{ old('imatge') }}">
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="col-25">
                <label for="alt_logo">Alt logo: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="alt_logo" value="{{ $informacio->alt_logo }}">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <h3>Informació de contacte:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-25">
                <label for="tel">Tel de contacte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="tel" value="{{ $informacio->tel }}">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="tel2">Segon Tel de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="tel2" value="{{ $informacio->tel2 }}">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="whatsapp">Whatsapp de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="whatsapp" value="{{ $informacio->whatsapp }}">
            </div>
        </div>
       
        
        <div class="row">
            <div class="col-25">
                <label for="correu">Correu electrònic de contacte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="correu" value="{{ $informacio->correu }}">
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
                <label for="adreca_1">Adreça de contacte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="adreca_1" value="{{ $informacio->adreca_1 }}">
            </div>
        </div>
        
       
       
        <div class="row">
            <div class="col-25">
                <label for="adreca_2">Segona adreça de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="adreca_2" value="{{ $informacio->adreca_2 }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="provincia">Provincia: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select id="selecProvincia">
                    <option value="{{ $informacio->provincia }}">{{ $informacio->provincia }}</option>
                </select>
                <input type="text" id="provinciaInput" name="provincia" value="{{ $informacio->provincia }}" hidden>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="ciutat">Poblacio: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecPoblacio">
                    <option value="{{ $informacio->ciutat }}">{{ $informacio->ciutat }}</option>
                </select>
                <input type="text" id="poblacioInput" name="ciutat" value="{{ $informacio->ciutat }}" hidden>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="zip_cp">Codi postal: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecCp">
                    <option value="{{ $informacio->zip_cp }}">{{ $informacio->zip_cp }}</option>
                </select>
                <input type="text" id="cpInput" name="zip_cp" value="{{ $informacio->zip_cp }}" hidden>
            </div>
        </div>
        
        

        <div class="row">
            <input type="submit" value="Editar">
        </div>
        
    </form>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/informacio.js')}}"></script>
@endsection