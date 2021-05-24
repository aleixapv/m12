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
    <form action="{{route('serveis.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="nom">Nom del servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="nom" value="{{ old('nom') }}" id="nom">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="descripcio">Descripció del servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <textarea name="descripcio" id="descripcio">{{ old('descripcio') }}</textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="imatge">Imatge del nou servei: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="file" name="imatge"  value="{{ old('imatge') }}" id="imatge">
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
                <div class="col-12" id="containerprojecte">
                    <div class="row d-flex justify-content-center" id="card_index"  style="display: none;" >
                        @include('frontend/servei')
                      </div>
                </div>
                
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Crear" >
            </div>
        </div>

    </form>
    <script src="https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
    <script src="{{url('js/src/nanospell/autoload.js')}}"></script>
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/serveis.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <script src="{{url('js/indexfrontend.js')}}"></script>
@endsection