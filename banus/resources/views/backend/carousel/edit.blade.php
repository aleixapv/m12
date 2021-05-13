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
        <input type="button" class="comprovar" id="novaDiapositiva" value="Nova diapositiva">
        <input type="button" class="comprovar" id="novaDiapositivaCancellar" value="cancel·lar" hidden>
    </div>
    <form action="{{route('projectes.store')}}" method="POST" enctype="multipart/form-data" id="formCrearDiapositiva" hidden>
        @csrf

        <div class="row">
            <div class="col-25">
                <h3>Nova diapositiva:</h3>
            </div>
            <div class="col-75">
                
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="imatge">Imates de la diapositiva: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="file" name="imatge" id="imatge"  value="{{ old('imatge') }}">
            </div>
        </div>
        <div class="col-12 divSortable row mt-3" id="divImatges">
            
        </div>
        <div class="row">
            <div class="col-25">
                <label for="alt">Alt del la diapositiva: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="alt" value="{{ old('alt') }}" id="alt">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="titol">Titol de la diapositiva: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="titol" value="{{ old('titol') }}" id="titol">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio">Descripció de la diapositiva: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio" rows="3" id="descripcio">{{ old('descripcio') }}</textarea>
            </div>
        </div>
        <div class="row">
            <input type="button" class="comprovar" value="Crear">
        </div>
    </form>
    
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <script src="{{url('js/sortable.js')}}"></script>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/carousel.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection