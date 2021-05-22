@extends('layouts.backEndLayout')
@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Enrrere</a>
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
                <label for="nom_empresa">NIF de la empresa: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="cif" value="{{ old('cif') }}">
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
        <hr>
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
        
        <hr>
        <div class="row">
            <div class="col-25">
                <h3>Ubicació:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-12 alert alert-success" id="ubicacioConfirmada" hidden>
               Ubicació confirmada.
            </div>
            <div class="col-12 alert alert-danger" id="ubicacioError" hidden>
               Ubicació no trobada, revisa la adreça.
            </div>
        </div> 
        <div class="row">
            <div class="col-25">
                <label for="adreca_1">Adreça de contacte: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input id="adrecaInput" type="text" name="adreca_1" value="{{ old('adreca_1') }}" class="ubicacio">
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
                <select id="selecProvincia" class="ubicacio">
                </select>
                <input type="text" id="provinciaInput" name="provincia" value="" hidden class="ubicacio">
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="ciutat">Poblacio: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecPoblacio" class="ubicacio">
                    
                </select>
                <input type="text" id="poblacioInput" name="ciutat" value="" hidden class="ubicacio">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-25">
                <label for="zip_cp">Codi postal: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <select name="" id="selecCp" class="ubicacio">
                    
                </select>
                <input type="text" id="cpInput" name="zip_cp" value="" hidden class="ubicacio">
            </div>
            <input type="text" hidden id="x" name="x" value="">
            <input type="text" hidden id="y" name="y" value="">
        </div>
        

        <div class="row">
            <input type="submit" value="Crear">
        </div>
    </form>
    
    <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"
  />
  <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geosearch/3.3.1/geosearch.js" integrity="sha512-4R7TaNSnotKoNx/u9WF10J/n1mUifo6M1fik+BfiZgP00O9aE4eXDYMvTl/hug3m5gw1GJNwVBepkvdCBGV3Rw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
      <script src="{{url('js/src/jquery.min.js')}}"></script>
      <script src="{{url('js/informacio.js')}}"></script>
      <script src="{{url('js/geocoding.js')}}"></script>
@endsection