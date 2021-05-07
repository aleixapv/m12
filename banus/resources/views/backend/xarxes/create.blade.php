@extends('layouts.backEndLayout')
@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <div class="alert alert-danger" id="error" hidden>
        Omple els camps.
    </div>
    <form action="{{route('xarxes.store')}}" method="POST" id="formXarxa">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="nom_empresa">Nom de la nova xarxa social: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="nom" value="{{ old('nom') }}" id="nomXarxa" >
            </div>
        </div>

        
        <div class="row">
            <div class="col-25">
                <a href="https://fontawesome.com/icons?d=gallery&p=2&m=free" target="_blank">Buscar icones</a>
            </div>
            <div class="col-75">
                
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nom_empresa">Icona de la xarxa social: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="icona" value="fab fa-" id="iconaXarxa">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="nom_empresa">Enllaç de la xarxa social: <i class="req">*</i></label>
            </div>
            <div class="col-75">
                <input type="text" name="enllac" value="{{ old('enllac') }}" id="enllac">
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
                    <h6>Si no es visualitza es per una clase de icona incorrecte.</h6>
                    <a href="https://fontawesome.com/icons?d=gallery&p=2&m=free" target="_blank">Buscar icones</a>
                </div>
                <div class="col-6 container">
                    <a href="" id="exemple" target="_blank"><i class=""></i></a>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Crear" >
            </div>
        </div>
        
    </form>
    
    <script src="{{url('js/src/jquery.min.js')}}"></script>
    <script src="{{url('js/xarxes.js')}}"></script>
@endsection