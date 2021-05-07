@extends('layouts.backEndLayout')
@section('content')
    
    @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route('informacio.empresa.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="nom_empresa">Nom de la empresa: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="nom_empresa" value="{{ old('nom_empresa') }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="eslogan">Eslogan:</label>
            </div>
            <div class="col-75">
                <input type="text" name="eslogan" value="{{ old('eslogan') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="imatge">Logo de la empresa: <i class="req">*</i></label>
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
                <input type="text" name="alt_logo" value="logo ">
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
                <input type="text" name="tel" value="{{ old('tel') }}">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="tel2">Segon Tel de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="tel2" value="{{ old('tel2') }}">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="whatsapp">Whatsapp de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="whatsapp" value="{{ old('whatsapp') }}">
            </div>
        </div>
       
        
        <div class="row">
            <div class="col-25">
                <label for="correu">Correu electrònic de contacte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="correu" value="{{ old('correu') }}">
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
                <input type="text" name="adreca_1" value="{{ old('adreca_1') }}">
            </div>
        </div>
        
       
       
        <div class="row">
            <div class="col-25">
                <label for="adreca_2">Segona adreça de contacte:</label>
            </div>
            <div class="col-75">
                <input type="text" name="adreca_2" value="{{ old('adreca_2') }}">
            </div>
        </div>
        
        
        
        <div class="row">
            <div class="col-25">
                <label for="provincia">Provincia: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select id="selecProvincia">
                </select>
                <input type="text" id="provinciaInput" name="provincia" value="" hidden>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="ciutat">Poblacio: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecPoblacio">
                    
                </select>
                <input type="text" id="poblacioInput" name="ciutat" value="" hidden>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="zip_cp">Codi postal: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecCp">
                    
                </select>
                <input type="text" id="cpInput" name="zip_cp" value="" hidden>
            </div>
        </div>
        

        <div class="row">
            <input type="submit" value="Crear">
        </div>
    </form>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/informacio.js')}}"></script>
@endsection